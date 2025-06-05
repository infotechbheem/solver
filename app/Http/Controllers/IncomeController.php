<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Income;
use App\Models\Expenditure;
use App\Models\InvoiceSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class IncomeController extends Controller
{
    public function incomeAdd()
    {
        $title = "Add Income";
        return view('finance-department.income.add-income', compact('title'));
    }

    public function incomeView()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $incomeList = Income::paginate(10);

        $totalIncome = Income::sum('amount_received');
        $todayIncomeTotal = Income::whereDate('payment_date', $today)->sum('amount_received');
        $yesterdayIncomeTotal = Income::whereDate('payment_date', $yesterday)->sum('amount_received');

        $pieChartData = Income::selectRaw('
            SUM(human_resource) as human_resource,
            SUM(camp_exp) as camp_exp,
            SUM(training_exp) as training_exp,
            SUM(equipment) as equipment,
            SUM(travel_exp) as travel_exp,
            SUM(material_exp) as material_exp,
            SUM(administrative_exp) as administrative_exp,
            SUM(accomodation_exp) as accomodation_exp,
            SUM(monitoring_exp) as monitoring_exp,
            SUM(miscellaneous_exp) as miscellaneous_exp
        ')->first();

        $typeLabels = [
            'individual_person_duration' => 'Indivisual Person Donation',
            'sub_grant' => 'Sub Grant',
            'contract' => 'Contract',
            'csr' => 'CSR',
            'gov_funds' => 'Govt. Funds',
            'training_fees' => 'Training Fees',
            'other' => 'Other',
        ];

        $hiresChart = DB::table('income')
            ->select('type_of_income', DB::raw('SUM(amount_received) as total_amount'))
            ->groupBy('type_of_income')
            ->get()
            ->map(function ($item) use ($typeLabels) {
                return [
                    'label' => $typeLabels[$item->type_of_income] ?? $item->type_of_income,
                    'total' => $item->total_amount,
                ];
            });

        $labels = $hiresChart->pluck('label');
        $totals = $hiresChart->pluck('total');

        $title = "View Income";
        return view('finance-department.income.view-income', compact('title', 'incomeList', 'totalIncome', 'todayIncomeTotal', 'yesterdayIncomeTotal', 'pieChartData', 'labels', 'totals'));
    }

    public function incomeStore(Request $request)
    {
        // dd($request->all());

        try {
            DB::beginTransaction();

            // File upload
            $proofPath = null;
            if ($request->hasFile('proof_of_evidence')) {
                $proofPath = $request->file('proof_of_evidence')->store('proofs', 'public');
            }
            // dd($proofPath);
            // Prepare data for insert
            $incomeData = [
                'type_of_income' => $request->income_type,
                'type_of_donation' => $request->donation_type,
                'donar_name' => $request->donar_name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'aadhar' => $request->aadhar,
                'pan' => $request->pan,
                'sanction_amount' => $request->sanction_amount,
                'amount_received' => $request->amount_received,
                'human_resource' => $request->human_resource,
                'camp_exp' => $request->camp_exp,
                'training_exp' => $request->training_exp,
                'equipment' => $request->equip_supplies,
                'travel_exp' => $request->travel_exp,
                'material_exp' => $request->material_exp,
                'administrative_exp' => $request->administrative_exp,
                'accomodation_exp' => $request->accomodation_exp,
                'monitoring_exp' => $request->monitoring_exp,
                'miscellaneous_exp' => $request->miscellaneous_exp,
                'no_of_installment' => $request->no_of_installment,
                'payment_mode' => $request->mode_of_payment,
                'proof_of_evidence' => $proofPath,
                'payment_date' => $request->payment_date,
                'type_of_project' => $request->project_type,
                'project_name' => $request->project_name,
                'project_duration_from' => $request->pro_duration_from,
                'project_duration_to' => $request->pro_duration_to,
                'state' => $request->state,
                'district' => $request->district,
                'project_description' => $request->project_description,
                'message' => $request->message,
            ];

            Income::create($incomeData);

            DB::commit();

            return redirect()->back()->with('success', 'Income record saved successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to save income record: ' . $e->getMessage());
        }
    }

    public function incomeDelete(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $incomeData = Income::findOrFail($id);

            $incomeData->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Income deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error deleting Income: ' . $th->getMessage());
        }
    }

    public function incomeDetails($id)
    {
        $id = decrypt($id);
        $incomeDetail = Income::where('id', $id)->first();
        $title = "Income Details";
        return view('finance-department.income.income-details', compact('title', 'incomeDetail'));
    }

    public function editIncome($id)
    {
        $id = decrypt($id);
        $incomeDetail = Income::where('id', $id)->first();

        $title = "Update Income Details";
        return view('finance-department.income.update-income-details', compact('title', 'incomeDetail'));
    }

    public function updateIncome(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Fetch existing record
            $income = Income::findOrFail($id);

            // File upload logic
            if ($request->hasFile('proof_of_evidence')) {
                // Delete old file if exists
                if ($income->proof_of_evidence && Storage::exists('public/' . $income->proof_of_evidence)) {
                    Storage::delete('public/' . $income->proof_of_evidence);
                }

                // Upload new file
                $proofPath = $request->file('proof_of_evidence')->store('proofs', 'public');
                $income->proof_of_evidence = $proofPath;
            }

            // Update data
            $income->type_of_income = $request->income_type;
            $income->type_of_donation = $request->donation_type;
            $income->donar_name = $request->donar_name;
            $income->email = $request->email;
            $income->contact_number = $request->contact_number;
            $income->aadhar = $request->aadhar;
            $income->pan = $request->pan;
            $income->sanction_amount = $request->sanction_amount;
            $income->amount_received = $request->amount_received;
            $income->human_resource = $request->human_resource;
            $income->camp_exp = $request->camp_exp;
            $income->training_exp = $request->training_exp;
            $income->equipment = $request->equip_supplies;
            $income->travel_exp = $request->travel_exp;
            $income->material_exp = $request->material_exp;
            $income->administrative_exp = $request->administrative_exp;
            $income->accomodation_exp = $request->accomodation_exp;
            $income->monitoring_exp = $request->monitoring_exp;
            $income->miscellaneous_exp = $request->miscellaneous_exp;
            $income->no_of_installment = $request->no_of_installment;
            $income->payment_mode = $request->mode_of_payment;
            $income->payment_date = $request->payment_date;
            $income->type_of_project = $request->project_type;
            $income->project_name = $request->project_name;
            $income->project_duration_from = $request->pro_duration_from;
            $income->project_duration_to = $request->pro_duration_to;
            $income->state = $request->state;
            $income->district = $request->district;
            $income->project_description = $request->project_description;
            $income->message = $request->message;

            // Save updated data
            $income->save();

            DB::commit();

            return redirect()->route('income.view-income')->with('success', 'Income record updated successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update income record: ' . $e->getMessage());
        }
    }
}
