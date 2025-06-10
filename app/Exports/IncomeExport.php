<?php

namespace App\Exports;

use App\Models\Income;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class IncomeExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Income::with(['csr', 'PartnerOrgnization']);

        if (!empty($this->filters['income_type'])) {
            $query->where('type_of_income', $this->filters['income_type']);
        }
        if (!empty($this->filters['donation_type'])) {
            $query->where('type_of_donation', $this->filters['donation_type']);
        }
        if (!empty($this->filters['project_type'])) {
            $query->where('type_of_project', $this->filters['project_type']);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'type_of_income',
            'csr_type',
            'partner_orgainisation_type',
            'type_of_donation',
            'donar_name',
            'email',
            'contact_number',
            'aadhar',
            'pan',
            'sanction_amount',
            'amount_received',
            'human_resource',
            'camp_exp',
            'training_exp',
            'equipment',
            'travel_exp',
            'material_exp',
            'administrative_exp',
            'accomodation_exp',
            'monitoring_exp',
            'miscellaneous_exp',
            'target_name',
            'target_amount',
            'no_of_installment',
            'payment_mode',
            'payment_date',
            'type_of_project',
            'project_name',
            'project_duration_from',
            'project_duration_to',
            'state',
            'district',
            'project_description',
            'message',
        ];
    }

    public function map($income): array
    {
        // Decode JSON safely
        $targetNames = json_decode($income->target_name, true);
        $targetAmounts = json_decode($income->target_amount, true);

        $targetNamesFormatted = is_array($targetNames) && !empty($targetNames)
            ? implode(', ', $targetNames)
            : '-';

        $targetAmountsFormatted = is_array($targetAmounts) && !empty($targetAmounts)
            ? implode(' | ', array_map(function ($a) {
                return number_format($a);
            }, $targetAmounts))
            : '-';

            return [
            $income->type_of_income ?? '-',
            $income->csr->company_name ?? '-',
            $income->PartnerOrgnization['company/ngo_name'] ?? '-',
            $income->type_of_donation ?? '-',
            $income->donar_name ?? '-',
            $income->email ?? '-',
            $income->contact_number ?? '-',
            $income->aadhar ?? '-',
            $income->pan ?? '-',
            $income->sanction_amount ?? '-',
            $income->amount_received ?? '-',
            $income->human_resource ?? '-',
            $income->camp_exp ?? '-',
            $income->training_exp ?? '-',
            $income->equipment ?? '-',
            $income->travel_exp ?? '-',
            $income->material_exp ?? '-',
            $income->administrative_exp ?? '-',
            $income->accomodation_exp ?? '-',
            $income->monitoring_exp ?? '-',
            $income->miscellaneous_exp ?? '-',
            $targetNamesFormatted,
            $targetAmountsFormatted,
            $income->no_of_installment ?? '-',
            $income->payment_mode ?? '-',
            $income->payment_date ? \Carbon\Carbon::parse($income->payment_date)->format('d-m-Y') : '-',
            $income->type_of_project ?? '-',
            $income->project_name ?? '-',
            $income->project_duration_from ?? '-',
            $income->project_duration_to ?? '-',
            $income->state ?? '-',
            $income->district ?? '-',
            $income->project_description ?? '-',
            $income->message ?? '-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
