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

class ExpenditureController extends Controller
{
    public function expenditureAdd()
    {
        $title = "Add Expenditure";
        return view('finance-department.expenditure.add-expenditure', compact('title'));
    }

    public function expenditureView()
    {
        // $today = Carbon::today();
        // $yesterday = Carbon::yesterday();

        $expenseList = Expenditure::paginate(10);

        // $totalIncome = Income::sum('amount_received');
        // $todayIncomeTotal = Income::whereDate('payment_date', $today)->sum('amount_received');
        // $yesterdayIncomeTotal = Income::whereDate('payment_date', $yesterday)->sum('amount_received');

        // $pieChartData = Income::selectRaw('
        //     SUM(human_resource) as human_resource,
        //     SUM(camp_exp) as camp_exp,
        //     SUM(training_exp) as training_exp,
        //     SUM(equipment) as equipment,
        //     SUM(travel_exp) as travel_exp,
        //     SUM(material_exp) as material_exp,
        //     SUM(administrative_exp) as administrative_exp,
        //     SUM(accomodation_exp) as accomodation_exp,
        //     SUM(monitoring_exp) as monitoring_exp,
        //     SUM(miscellaneous_exp) as miscellaneous_exp
        // ')->first();

        // $typeLabels = [
        //     'individual_person_duration' => 'Indivisual Person Donation',
        //     'sub_grant' => 'Sub Grant',
        //     'contract' => 'Contract',
        //     'csr' => 'CSR',
        //     'gov_funds' => 'Govt. Funds',
        //     'training_fees' => 'Training Fees',
        //     'other' => 'Other',
        // ];

        // $hiresChart = DB::table('income')
        //     ->select('type_of_income', DB::raw('SUM(amount_received) as total_amount'))
        //     ->groupBy('type_of_income')
        //     ->get()
        //     ->map(function ($item) use ($typeLabels) {
        //         return [
        //             'label' => $typeLabels[$item->type_of_income] ?? $item->type_of_income,
        //             'total' => $item->total_amount,
        //         ];
        //     });

        // $labels = $hiresChart->pluck('label');
        // $totals = $hiresChart->pluck('total');

        $title = "View Expenditure";
        return view('finance-department.expenditure.view-expenditure', compact('title','expenseList'));
    }

    public function expenditureStore(Request $request)
    {
        // dd($request->all());

        try {
            DB::beginTransaction();

            // File upload
            $invoicePath = null;
            $proofPath = null;

            if ($request->hasFile('invoice')) {
                $invoicePath = $request->file('invoice')->store('invoices', 'public');
            }

            if ($request->hasFile('proof_of_payment')) {
                $proofPath = $request->file('proof_of_payment')->store('payment_proofs', 'public');
            }

            $expenditureData = [
                'expense_date' => $request->expense_date,
                'expense_sector' => $request->expense_sector,
                'project_name' => $request->project_name,
                'name' => $request->name,
                'type_of_expense' => $request->type_of_expense,
                'administrative_expense' => $request->administrative_expense,
                'human_resource' => $request->human_resource,
                'hr_expense_date' => $request->hr_expense_date,
                'equip_expense_date' => $request->equip_expense_date,
                'equip_cost' => $request->equip_cost,
                'equip_supplier_name' => $request->equip_supplier_name,
                'travel_exp_date' => $request->travel_exp_date,
                'travel_exp_departure' => $request->travel_exp_departure,
                'travel_exp_arrirval' => $request->travel_exp_arrirval,
                'travel_exp_mode_of_travel' => $request->travel_exp_mode_of_travel,
                'date_of_material_exp' => $request->date_of_material_exp,
                'item' => $request->item,
                'quantity' => $request->quantity,
                'rate_per_unit' => $request->rate_per_unit,
                'total_cost' => $request->total_cost,
                'remarks' => $request->remarks,
                'date_of_accommodation_exp' => $request->date_of_accommodation_exp,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
                'no_of_days' => $request->no_of_days,
                'date_of_miscellaneous_exp' => $request->date_of_miscellaneous_exp,
                'other' => $request->other,
                'miscellaneous_exp_remarks' => $request->miscellaneous_exp_remarks,
                'miscellaneous_exp_discription' => $request->miscellaneous_exp_discription,
                'amount' => $request->amount,
                'section' => $request->section,
                'tds_deduction_percentage' => $request->tds_deduction_percentage,
                'tds_deduction_amount' => $request->tds_deduction_amount,
                'sub_total_amount' => $request->sub_total_amount,
                'net_payment' => $request->net_payment,
                'advance_deposit' => $request->advance_deposit,
                'pan' => $request->pan,
                'tds_deduction_date' => $request->tds_deduction_date,
                'mode_of_payment' => $request->mode_of_payment,
                'advance' => $request->advance,
                'type_of_payment' => $request->type_of_payment,
                'description' => $request->description,
                'invoice' => $invoicePath,
                'proof_of_payment' => $proofPath,
            ];

            Expenditure::create($expenditureData);

            DB::commit();
            return redirect()->back()->with('success', 'Expenditure record saved successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to save expenditure record: ' . $e->getMessage());
        }
    }

    public function expenditureDelete(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $expenseData = Expenditure::findOrFail($id);

            $expenseData->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Expenditure deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error deleting Expenditure: ' . $th->getMessage());
        }
    }

    public function expenditureDetails($id)
    {
        $id = decrypt($id);
        $expenseDetail = Expenditure::where('id', $id)->first();
        $title = "View Expenditure Details";
        return view('finance-department.expenditure.view-expenditure-details', compact('title','expenseDetail'));
    }

    // public function editIncome($id)
    // {
    //     $id = decrypt($id);
    //     $incomeDetail = Income::where('id', $id)->first();

    //     $title = "Update Income Details";
    //     return view('finance-department.income.update-income-details', compact('title', 'incomeDetail'));
    // }

    // public function updateIncome(Request $request, $id)
    // {
    //     try {
    //         DB::beginTransaction();

    //         // Fetch existing record
    //         $income = Income::findOrFail($id);

    //         // File upload logic
    //         if ($request->hasFile('proof_of_evidence')) {
    //             // Delete old file if exists
    //             if ($income->proof_of_evidence && Storage::exists('public/' . $income->proof_of_evidence)) {
    //                 Storage::delete('public/' . $income->proof_of_evidence);
    //             }

    //             // Upload new file
    //             $proofPath = $request->file('proof_of_evidence')->store('proofs', 'public');
    //             $income->proof_of_evidence = $proofPath;
    //         }

    //         // Update data
    //         $income->type_of_income = $request->income_type;
    //         $income->type_of_donation = $request->donation_type;
    //         $income->donar_name = $request->donar_name;
    //         $income->email = $request->email;
    //         $income->contact_number = $request->contact_number;
    //         $income->aadhar = $request->aadhar;
    //         $income->pan = $request->pan;
    //         $income->sanction_amount = $request->sanction_amount;
    //         $income->amount_received = $request->amount_received;
    //         $income->human_resource = $request->human_resource;
    //         $income->camp_exp = $request->camp_exp;
    //         $income->training_exp = $request->training_exp;
    //         $income->equipment = $request->equip_supplies;
    //         $income->travel_exp = $request->travel_exp;
    //         $income->material_exp = $request->material_exp;
    //         $income->administrative_exp = $request->administrative_exp;
    //         $income->accomodation_exp = $request->accomodation_exp;
    //         $income->monitoring_exp = $request->monitoring_exp;
    //         $income->miscellaneous_exp = $request->miscellaneous_exp;
    //         $income->no_of_installment = $request->no_of_installment;
    //         $income->payment_mode = $request->mode_of_payment;
    //         $income->payment_date = $request->payment_date;
    //         $income->type_of_project = $request->project_type;
    //         $income->project_name = $request->project_name;
    //         $income->project_duration_from = $request->pro_duration_from;
    //         $income->project_duration_to = $request->pro_duration_to;
    //         $income->state = $request->state;
    //         $income->district = $request->district;
    //         $income->project_description = $request->project_description;
    //         $income->message = $request->message;

    //         // Save updated data
    //         $income->save();

    //         DB::commit();

    //         return redirect()->route('income.view-income')->with('success', 'Income record updated successfully!');
    //     } catch (\Throwable $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Failed to update income record: ' . $e->getMessage());
    //     }
    // }
}
