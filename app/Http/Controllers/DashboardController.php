<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Income;
use App\Models\Expenditure;
use App\Models\Team;
use App\Models\Program;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $totalIncome = Income::sum('amount_received');
        $totalExpenditure = Expenditure::sum('sub_total_amount');
        $totalMember = Team::count();

        $typeLabels = [
            'social_protection' => 'Social Protection',
            'livelihood' => 'Livelihood',
            'communinty_capacity' => 'Community Capacity',
            'digital_literacy' => 'Digital Literacy',
            'other' => 'Other',
        ];

        // First: get grant amount by project type
        $grantAmtByProgram = Income::selectRaw('
                type_of_project,
                SUM(human_resource) +
                SUM(camp_exp) +
                SUM(training_exp) +
                SUM(equipment) +
                SUM(travel_exp) +
                SUM(material_exp) +
                SUM(administrative_exp) +
                SUM(accomodation_exp) +
                SUM(monitoring_exp) +
                SUM(miscellaneous_exp) AS total_amount
            ')
            ->groupBy('type_of_project')
            ->get()
            ->map(function ($item) use ($typeLabels) {
                return [
                    'label' => $typeLabels[$item->type_of_project] ?? $item->type_of_project,
                    'total' => $item->total_amount,
                ];
            });

        $labels = $grantAmtByProgram->pluck('label');
        $totals = $grantAmtByProgram->pluck('total');

        $beneficiaryInProgram = Program::with('team')->select([
            'beneficiary_name',
            'support_partner',
            'donar_organisation',
            'project',
            'program_type',
            'team_member_name',
        ])->orderBy('created_at', 'desc')->take(10)->get();

        $grantTargetByProgram = DB::table('income')
            ->select('type_of_project', 'target_name', 'target_amount')
            ->get()
            ->groupBy('type_of_project')
            ->map(function ($items, $type) use ($typeLabels) {
                $total = 0;
                $nameAmountPairs = [];

                foreach ($items as $item) {
                    $names = json_decode($item->target_name ?? '[]', true);
                    $amounts = json_decode($item->target_amount ?? '[]', true);

                    if (is_array($names) && is_array($amounts)) {
                        foreach ($names as $index => $name) {
                            $amount = $amounts[$index] ?? 0;
                            $amount = is_numeric($amount) ? (float)$amount : 0;
                            $total += $amount;
                            $nameAmountPairs[] = "{$name}(" . number_format($amount) . ")";
                        }
                    }
                }

                return [
                    'label' => ($typeLabels[$type] ?? $type),
                    'detail' => implode(', ', $nameAmountPairs),
                    'total' => $total
                ];
            })
            ->values();

        $labelsAlotedTarget = $grantTargetByProgram->pluck('label');
        $tooltipsAlotedTarget = $grantTargetByProgram->pluck('detail');
        $totalsAlotedTarget = $grantTargetByProgram->pluck('total');

        return view('index', compact('totalIncome', 'totalExpenditure', 'totalMember', 'labels', 'totals', 'beneficiaryInProgram', 'labelsAlotedTarget', 'totalsAlotedTarget','tooltipsAlotedTarget'));
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logout successfully!!');
        }
    }
}
