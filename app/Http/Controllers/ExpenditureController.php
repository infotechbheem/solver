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

    public function expenditureView(Request $request)
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $expenseList = Expenditure::paginate(10);

        $totalExpenditure = Expenditure::sum('sub_total_amount');
        $todayExpenditureTotal = Expenditure::whereDate('expense_date', $today)->sum('sub_total_amount');
        $yesterdayExpenditureTotal = Expenditure::whereDate('expense_date', $yesterday)->sum('sub_total_amount');

        $adminExpenseLabels = [
            'food_beverage' => 'Food & Beverage',
            'rent' => 'Rent',
            'utilities' => 'Utilities',
            'insurance' => 'Insurance',
            'wages_salaries' => 'Wages & Salaries',
            'office_fixtures' => 'Office Fixtures & Equipment',
            'legal_finance_service' => 'Legal & Finance Service Fees',
            'office_suplies' => 'Office Supplies',
            'travel' => 'Travel',
            'it_service' => 'IT Service',
            'licence_subscriptions' => 'Licence & Subscriptions',
        ];
        $expenseTypeLabels = [
            'human_resource' => 'Human Resource',
            'equipment' => 'Equipment & Supplies',
            'travel_expenses' => 'Travel Expenses',
            'iec_material' => 'IEC Material Expenses',
            'accomodation_expenses' => 'Accommodation Expenses',
            'miscellaneous_expenses' => 'Miscellaneous Expenses',
        ];

        $pieChartData = Expenditure::select('administrative_expense', DB::raw('SUM(sub_total_amount) as total'))
            ->whereNotNull('administrative_expense')
            ->groupBy('administrative_expense')
            ->get();

        $labels = [];
        $data = [];

        foreach ($pieChartData as $raw) {
            $key = $raw->administrative_expense;
            if (isset($adminExpenseLabels[$key])) {
                $labels[] = $adminExpenseLabels[$key];
                $data[] = $raw->total;
            }
        }

        $hiresChart = DB::table('expenditure')
            ->select('type_of_expense', DB::raw('SUM(sub_total_amount) as total_amount'))
            ->groupBy('type_of_expense')
            ->get()
            ->map(function ($item) use ($expenseTypeLabels) {
                return [
                    'label' => $expenseTypeLabels[$item->type_of_expense] ?? $item->type_of_expense,
                    'total' => $item->total_amount,
                ];
            });

        $hireChartLabel = $hiresChart->pluck('label');
        $hireChartTotal = $hiresChart->pluck('total');

        $query = Expenditure::query();

        if ($request->filled('expenseSector')) {
            $query->where('expense_sector', $request->expenseSector);
        }

        if ($request->filled('expenseType')) {
            $query->where('type_of_expense', $request->expenseType);
        }

        if ($request->filled('administrative_expense')) {
            $query->where('administrative_expense', $request->administrative_expense);
        }

        $filteredExpenditure = $query->paginate(10)->appends($request->all());

        $title = "View Expenditure";
        return view('finance-department.expenditure.view-expenditure', compact('title', 'expenseList', 'totalExpenditure', 'todayExpenditureTotal', 'yesterdayExpenditureTotal', 'labels', 'data', 'hireChartLabel', 'hireChartTotal', 'filteredExpenditure'));
    }

    public function expenditureStore(Request $request)
    {
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

                // HR
                'hr_amount' => $request->hr_amount,
                'hr_section' => $request->hr_section,
                'hr_tds_deduction_percentage' => $request->hr_tds_deduction_percentage,
                'hr_tds_deduction_amount' => $request->hr_tds_deduction_amount,
                'hr_pan' => $request->hr_pan,
                'hr_tds_deduction_date' => $request->hr_tds_deduction_date,
                'hr_total_amount' => $request->hr_total_amount,

                // Equipment
                'equip_amount' => $request->equip_amount,
                'equip_section' => $request->equip_section,
                'equip_tds_deduction_percentage' => $request->equip_tds_deduction_percentage,
                'equip_tds_deduction_amount' => $request->equip_tds_deduction_amount,
                'equip_pan' => $request->equip_pan,
                'equip_tds_deduction_date' => $request->equip_tds_deduction_date,
                'equip_total_amount' => $request->equip_total_amount,

                // Travel
                'travel_exp_amount' => $request->travel_exp_amount,
                'travel_exp_section' => $request->travel_exp_section,
                'travel_exp_tds_deduction_percentage' => $request->travel_exp_tds_deduction_percentage,
                'travel_exp_tds_deduction_amount' => $request->travel_exp_tds_deduction_amount,
                'travel_exp_pan' => $request->travel_exp_pan,
                'travel_exp_tds_deduction_date' => $request->travel_exp_tds_deduction_date,
                'travel_exp_total_amount' => $request->travel_exp_total_amount,

                // Material
                'material_amount' => $request->material_amount,
                'material_section' => $request->material_section,
                'material_tds_deduction_percentage' => $request->material_tds_deduction_percentage,
                'material_tds_deduction_amount' => $request->material_tds_deduction_amount,
                'material_pan' => $request->material_pan,
                'material_tds_deduction_date' => $request->material_tds_deduction_date,
                'material_total_amount' => $request->material_total_amount,

                // Accommodation
                'accomodation_amount' => $request->accomodation_amount,
                'accomodation_section' => $request->accomodation_section,
                'accomodation_tds_deduction_percentage' => $request->accomodation_tds_deduction_percentage,
                'accomodation_tds_deduction_amount' => $request->accomodation_tds_deduction_amount,
                'accomodation_pan' => $request->accomodation_pan,
                'accomodation_tds_deduction_date' => $request->accomodation_tds_deduction_date,
                'accomodation_total_amount' => $request->accomodation_total_amount,

                // Miscellaneous
                'miscellaneous_amount' => $request->miscellaneous_amount,
                'miscellaneous_section' => $request->miscellaneous_section,
                'miscellaneous_tds_deduction_percentage' => $request->miscellaneous_tds_deduction_percentage,
                'miscellaneous_tds_deduction_amount' => $request->miscellaneous_tds_deduction_amount,
                'miscellaneous_pan' => $request->miscellaneous_pan,
                'miscellaneous_tds_deduction_date' => $request->miscellaneous_tds_deduction_date,
                'miscellaneous_total_amount' => $request->miscellaneous_total_amount,
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
        return view('finance-department.expenditure.view-expenditure-details', compact('title', 'expenseDetail'));
    }

    public function expenditureFilterList(Request $request)
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $expenseSector = $request->input('expenseSector');
        $expenseType = $request->input('expenseType');

        $baseQuery = Expenditure::query();

        if (!empty($expenseSector)) {
            $baseQuery->where('expense_sector', $expenseSector);
        }
        if (!empty($expenseType)) {
            $baseQuery->where('type_of_expense', $expenseType);
        }

        $expenseListFiltered = $baseQuery->paginate(10)->appends($request->all());
        $totalExpenditureFiltered = (clone $baseQuery)->sum('sub_total_amount');
        $todayExpenditureTotalFiltered = (clone $baseQuery)->whereDate('expense_date', $today)->sum('sub_total_amount');
        $yesterdayExpenditureTotalFiltered = (clone $baseQuery)->whereDate('expense_date', $yesterday)->sum('sub_total_amount');

        $adminExpenseLabels = [
            'food_beverage' => 'Food & Beverage',
            'rent' => 'Rent',
            'utilities' => 'Utilities',
            'insurance' => 'Insurance',
            'wages_salaries' => 'Wages & Salaries',
            'office_fixtures' => 'Office Fixtures & Equipment',
            'legal_finance_service' => 'Legal & Finance Service Fees',
            'office_suplies' => 'Office Supplies',
            'travel' => 'Travel',
            'it_service' => 'IT Service',
            'licence_subscriptions' => 'Licence & Subscriptions',
        ];

        $expenseTypeLabels = [
            'human_resource' => 'Human Resource',
            'equipment' => 'Equipment & Supplies',
            'travel_expenses' => 'Travel Expenses',
            'iec_material' => 'IEC Material Expenses',
            'accomodation_expenses' => 'Accommodation Expenses',
            'miscellaneous_expenses' => 'Miscellaneous Expenses',
        ];

        $pieChartData = Expenditure::select('administrative_expense', DB::raw('SUM(sub_total_amount) as total'))
            ->whereNotNull('administrative_expense')
            ->when($expenseSector, fn($q) => $q->where('expense_sector', $expenseSector))
            ->when($expenseType, fn($q) => $q->where('type_of_expense', $expenseType))
            ->groupBy('administrative_expense')
            ->get();

        $labelsFiltered = [];
        $dataFiltered = [];

        foreach ($pieChartData as $raw) {
            $key = $raw->administrative_expense;
            if (isset($adminExpenseLabels[$key])) {
                $labelsFiltered[] = $adminExpenseLabels[$key];
                $dataFiltered[] = $raw->total;
            }
        }

        $hiresChart = DB::table('expenditure')
            ->select('type_of_expense', DB::raw('SUM(sub_total_amount) as total_amount'))
            ->when($expenseSector, fn($q) => $q->where('expense_sector', $expenseSector))
            ->when($expenseType, fn($q) => $q->where('type_of_expense', $expenseType))
            ->groupBy('type_of_expense')
            ->get()
            ->map(fn($item) => [
                'label' => $expenseTypeLabels[$item->type_of_expense] ?? $item->type_of_expense,
                'total' => $item->total_amount,
            ]);

        $hireChartLabelFiltered = $hiresChart->pluck('label');
        $hireChartTotalFiltered = $hiresChart->pluck('total');

        return view('finance-department.expenditure.view-expenditure', [
            'title' => 'View Expenditure',
            'expenseList' => $expenseListFiltered,
            'totalExpenditure' => $totalExpenditureFiltered,
            'todayExpenditureTotal' => $todayExpenditureTotalFiltered,
            'yesterdayExpenditureTotal' => $yesterdayExpenditureTotalFiltered,
            'labels' => $labelsFiltered,
            'data' => $dataFiltered,
            'hireChartLabel' => $hireChartLabelFiltered,
            'hireChartTotal' => $hireChartTotalFiltered,
        ]);
    }

    public function editExpenditure($id)
    {
        $id = decrypt($id);
        $expenditureDetail = Expenditure::where('id', $id)->first();

        $title = "Update Expenditure Details";
        return view('finance-department.expenditure.update-expenditure-details', compact('title', 'expenditureDetail'));
    }

    public function updateExpenditure(Request $request, $id)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();

            // Fetch existing record by ID (assuming $id is passed in route or form)
            $expenditure = Expenditure::findOrFail($id);

            // Handle file uploads (only update if new files are uploaded)
            $invoicePath = $expenditure->invoice;
            $proofPath = $expenditure->proof_of_payment;

            if ($request->hasFile('invoice')) {
                $invoicePath = $request->file('invoice')->store('invoices', 'public');
            }

            if ($request->hasFile('proof_of_payment')) {
                $proofPath = $request->file('proof_of_payment')->store('payment_proofs', 'public');
            }

            // Prepare data
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

            $expenditure->update($expenditureData);

            DB::commit();
            return redirect()->route('expenditure.view-expenditure')->with('success', 'Expenditure record updated successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update expenditure record: ' . $e->getMessage());
        }
    }

    public function filterExpense(Request $request)
    {
        return redirect()->route('expenditure.view-expenditure', [
            'expenseSector' => $request->expenseSector,
            'expenseType' => $request->expenseType,
            'administrative_expense' => $request->administrative_expense,
        ]);
    }
}
