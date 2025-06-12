<?php

namespace App\Exports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class ProgramExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = program::with(['csr', 'partnerOrg', 'team', 'livelihoods', 'digitalLiteracies', 'communities', 'socialProtections']);

        if (!empty($this->filters['program_type'])) {
            $query->where('program_type', $this->filters['program_type']);
        }
        return $query->get();
    }

    public function headings(): array
    {
        return [
            'program_type',
            'date',
            'state',
            'district',
            'donar_organisation',
            'project',
            'support_partner',
            'gender',
            'team_member_name',
            'beneficiary_name',
            'age',
            'caste',
            'mobile_number',
            'religion',
            'occupation',
            'family_income',
            'livlihood_differently_abled',
            'livelihood_support',
            'livlihood_support_description',
            'digital_differently_abled',
            'digital_area',
            'type_of_sessions',
            'community_differently_abled',
            'community_area',
            'community_project',
            'ngo_shg_cooperative_fpo_other',
            'org_representative_name',
            'org_type',
            'working_period',
            'no_of_members',
            'org_focused_working_area',
            'community_support_org',
            'community_support',
            'support_description',
            'social_differently_abled',
            'applied_document',
            'applied_scheme',
        ];
    }

    public function map($program): array
    {
        return [
            $program->program_type ?? '-',
            $program->date ? \Carbon\Carbon::parse($program->date)->format('d-m-Y') : '-',
            $program->state ?? '-',
            $program->district ?? '-',
            $program->csr->company_name ?? '-',
            $program->contact_number ?? '-',
            $program->project ?? '-',
            $program->PartnerOrgnization['company/ngo_name'] ?? '-',
            $program->gender ?? '-',
            $program->team->full_name ?? '-',
            $program->beneficiary_name ?? '-',
            $program->age ?? '-',
            $program->caste ?? '-',
            $program->mobile_number ?? '-',
            $program->religion ?? '-',
            $program->occupation ?? '-',
            $program->family_income ?? '-',
            $program->livelihoods->first()->differently_abled ?? '-',
            $program->livelihoods->first()->support ?? '-',
            $program->livelihoods->first()->support_description ?? '-',

            $program->digitalLiteracies->first()->differently_abled ?? '-',
            $program->digitalLiteracies->first()->area ?? '-',
            $program->digitalLiteracies->first()->type_of_sessions ?? '-',

            $program->communities->first()->differently_abled ?? '-',
            $program->communities->first()->area ?? '-',
            $program->communities->first()->project ?? '-',
            $program->communities->first()->ngo_shg_cooperative_fpo_other ?? '-',
            $program->communities->first()->org_representative_name ?? '-',
            $program->communities->first()->org_type ?? '-',
            $program->communities->first()->working_period ?? '-',
            $program->communities->first()->no_of_members ?? '-',
            $program->communities->first()->org_focused_working_area ?? '-',
            $program->communities->first()->support ?? '-',
            $program->communities->first()->community_support ?? '-',
            $program->communities->first()->support_description ?? '-',

            $program->socialProtections->first()->differently_abled ?? '-',
            $program->socialProtections->first()->applied_document ?? '-',
            $program->socialProtections->first()->applied_scheme ?? '-',

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
