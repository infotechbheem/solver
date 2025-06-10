<?php

namespace App\Exports;

use App\Models\Expenditure;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExpenditureExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Expenditure::query();

        if (!empty($this->filters['expenseSector'])) {
            $query->where('expense_sector', $this->filters['expenseSector']);
        }

        if (!empty($this->filters['expenseType'])) {
            $query->where('type_of_expense', $this->filters['expenseType']);
        }

        if (!empty($this->filters['administrative_expense'])) {
            $query->where('administrative_expense', $this->filters['administrative_expense']);
        }

        return $query->get(); // Get after applying filters
    }

    public function headings(): array
    {
        return [
            'Expense Date',
            'Expense Sector',
            'Project Name',
            'Name',
            'Type of Expense',
            'Administrative Expense',
            'Human Resource',
            'HR Expense Date',
            'Equipment Expense Date',
            'Equipment Cost',
            'Equipment Supplier Name',
            'Travel Expense Date',
            'Departure',
            'Arrival',
            'Mode of Travel',
            'Material Expense Date',
            'Item',
            'Quantity',
            'Rate per Unit',
            'Total Cost',
            'Remarks',
            'Accommodation Expense Date',
            'Check-in',
            'Check-out',
            'No. of Days',
            'Miscellaneous Expense Date',
            'Other',
            'Miscellaneous Remarks',
            'Miscellaneous Description',
            'Amount',
            'Section',
            'TDS %',
            'TDS Amount',
            'PAN',
            'TDS Date',
            'Mode of Payment',
            'Sub Total Amount',
            'Advance',
            'Net Payment',
            'Advance Deposit',
            'Type of Payment',
            'Description',
        ];
    }

    public function map($expense): array
    {
        return [
            $expense->expense_date ? \Carbon\Carbon::parse($expense->expense_date)->format('d-m-Y') : '-',
            $expense->expense_sector ?? '-',
            $expense->project_name ?? '-',
            $expense->name ?? '-',
            $expense->type_of_expense ?? '-',
            $expense->administrative_expense ?? '-',
            $expense->human_resource ?? '-',
            $expense->hr_expense_date ? \Carbon\Carbon::parse($expense->hr_expense_date)->format('d-m-Y') : '-',
            $expense->equip_expense_date ? \Carbon\Carbon::parse($expense->equip_expense_date)->format('d-m-Y') : '-',
            $expense->equip_cost ?? '-',
            $expense->equip_supplier_name ?? '-',
            $expense->travel_exp_date ? \Carbon\Carbon::parse($expense->travel_exp_date)->format('d-m-Y') : '-',
            $expense->travel_exp_departure ?? '-',
            $expense->travel_exp_arrirval ?? '-',
            $expense->travel_exp_mode_of_travel ?? '-',
            $expense->date_of_material_exp ? \Carbon\Carbon::parse($expense->date_of_material_exp)->format('d-m-Y') : '-',
            $expense->item ?? '-',
            $expense->quantity ?? '-',
            $expense->rate_per_unit ?? '-',
            $expense->total_cost ?? '-',
            $expense->remarks ?? '-',
            $expense->date_of_accommodation_exp ? \Carbon\Carbon::parse($expense->date_of_accommodation_exp)->format('d-m-Y') : '-',
            $expense->checkin ?? '-',
            $expense->checkout ?? '-',
            $expense->no_of_days ?? '-',
            $expense->date_of_miscellaneous_exp ? \Carbon\Carbon::parse($expense->date_of_miscellaneous_exp)->format('d-m-Y') : '-',
            $expense->other ?? '-',
            $expense->miscellaneous_exp_remarks ?? '-',
            $expense->miscellaneous_exp_description ?? '-',
            $expense->amount ?? '-',
            $expense->section ?? '-',
            $expense->tds_deduction_percentage ?? '-',
            $expense->tds_deduction_amount ?? '-',
            $expense->pan ?? '-',
            $expense->tds_deduction_date ? \Carbon\Carbon::parse($expense->tds_deduction_date)->format('d-m-Y') : '-',
            $expense->mode_of_payment ?? '-',
            $expense->sub_total_amount ?? '-',
            $expense->advance ?? '-',
            $expense->net_payment ?? '-',
            $expense->advance_deposit ?? '-',
            $expense->type_of_payment ?? '-',
            $expense->description ?? '-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Header row styling
        ];
    }
}
