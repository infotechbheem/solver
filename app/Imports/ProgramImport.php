<?php

namespace App\Imports;

use App\Models\Program;
use App\Models\Livelihoods;
use App\Models\Communities;
use App\Models\DigitalLiteracies;
use App\Models\SocialProtection;
use App\Models\CSRPartner;
use App\Models\Team;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        // Skip if already exists or empty name
        if (empty($row['beneficiary_name']) || Program::where('beneficiary_name', $row['beneficiary_name'])->exists()) {
            return;
        }

        DB::beginTransaction();

        try {
            $csrId = !empty($row['csr'])
                ? CSRPartner::where('company_name', trim($row['csr']))->value('id')
                : null;

            $partnerId = !empty($row['partner_organisation'])
                ? DB::table('partner_orgnizations')
                ->whereRaw("`company/ngo_name` = ?", [trim($row['partner_organisation'])])
                ->value('id')
                : null;

            $teamMemberId = !empty($row['team_member'])
                ? Team::where('full_name', trim($row['team_member']))->value('id')
                : null;

            $date = null;
            if (!empty($row['date'])) {
                $date = is_numeric($row['date'])
                    ? ExcelDate::excelToDateTimeObject($row['date'])->format('Y-m-d')
                    : date('Y-m-d', strtotime(str_replace('/', '-', $row['date'])));
            }

            $program = Program::create([
                'program_type'       => $row['program_type'] ?? null,
                'date'               => $date,
                'state'              => $row['state'] ?? null,
                'district'           => $row['district'] ?? null,
                'donar_organisation' => $csrId,
                'project'            => $row['project'] ?? null,
                'support_partner'    => $partnerId,
                'gender'             => $row['gender'] ?? null,
                'team_member_name'   => $teamMemberId,
                'beneficiary_name'   => $row['beneficiary_name'],
                'age'                => $row['age'] ?? null,
                'caste'              => $row['caste'] ?? null,
                'mobile_number'      => $row['mobile_number'] ?? null,
                'religion'           => $row['religion'] ?? null,
                'occupation'         => $row['occupation'] ?? null,
                'family_income'      => $row['family_income'] ?? null,
            ]);

            // Social Protection
            if (!empty($row['social_protection_document_applied']) && !empty($row['social_protection_scheme_apply'])) {
                SocialProtection::create([
                    'program_id'        => $program->id,
                    'differently_abled' => $row['social_protection_differently_abled'] ?? null,
                    'applied_document'  => $row['social_protection_document_applied'],
                    'applied_scheme'    => $row['social_protection_scheme_apply'],
                ]);
            }

            // Livelihoods
            if (!empty($row['livlihood_support']) && !empty($row['livlihood_support_deciption'])) {
                Livelihoods::create([
                    'program_id'          => $program->id,
                    'differently_abled'   => $row['livlihood_differnently_abled'] ?? null,
                    'support'             => $row['livlihood_support'],
                    'support_description' => $row['livlihood_support_deciption'],
                ]);
            }

            // Digital Literacy
            if (!empty($row['digital_area']) && !empty($row['digital_type_of_session'])) {
                DigitalLiteracies::create([
                    'program_id'        => $program->id,
                    'differently_abled' => $row['digital_differnetly_abled'] ?? null,
                    'area'              => $row['digital_area'],
                    'type_of_sessions'  => $row['digital_type_of_session'],
                ]);
            }

            // Communities
            if (!empty($row['organisation_type']) && !empty($row['community_organisatiion_representative_name'])) {
                Communities::create([
                    'program_id'                        => $program->id,
                    'differently_abled'                 => $row['community_differently_abled'] ?? null,
                    'area'                              => $row['community_area'] ?? null,
                    'project'                           => $row['community_project'] ?? null,
                    'ngo_shg_cooperative_fpo_other'     => $row['community_ngo_shg_cooperative_fpo_other'] ?? null,
                    'org_representative_name'           => $row['community_organisatiion_representative_name'],
                    'org_type'                          => $row['organisation_type'],
                    'working_period'                    => $row['community_working_period'] ?? null,
                    'no_of_members'                     => $row['community_no_of_members'] ?? null,
                    'org_focused_working_area'          => $row['community_organisation_focused_working_area'] ?? null,
                    'support'                           => $row['community_organisational_support'] ?? null,
                    'community_support'                 => $row['communty_support'] ?? null,
                    'support_description'               => $row['community_support_description'] ?? null,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Import Error: ' . $e->getMessage(), ['row' => $row]);
        }
    }
}
