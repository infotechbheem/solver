<?php

namespace App\Http\Controllers;
use App\Models\Livelihoods;
use App\Models\Program;
use App\Models\Communities;
use App\Models\DigitalLiteracies;
use App\Models\SocialProtection;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function addProgram()
    {
        $title = "Add Program";
        return view('program-department.add-program', compact('title'));
    }
    public function viewProgram()
    {
        $programs = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->paginate(10);

        $title = "View Program";
        return view('program-department.view-program', compact('title', 'programs'));
    }
    public function viewProgramDetails()
    {
        $title = "View Program Details";
        return view('program-department.view-program-details', compact('title'));
    }
    public function updateProgramDetails()
    {
        $title = "View Program Details";
        return view('program-department.view-program-details', compact('title'));
    }
    public function deliverabels()
    {
        $title = "Plan & Deliverabels";
        return view('program-department.deliverabels', compact('title'));
    }

    public function storeProgram(Request $request)
    {
        try {
            DB::beginTransaction();

            // First table: programs (always inserted)
            $programData = [
                'program_type' => $request->prog_type,
                'date' => $request->from_date,
                'state' => $request->state,
                'district' => $request->district,
                'donar_organisation' => $request->donor_org,
                'project' => $request->project,
                'support_partner' => $request->support,
                'gender' => $request->gender,
                'team_member_name' => $request->team_member,
                'beneficiary_name' => $request->bene_name,
                'age' => $request->age,
                'caste' => $request->caste,
                'mobile_number' => $request->mob_no,
                'religion' => $request->religion,
                'occupation' => $request->occupation,
                'family_income' => $request->family_income,
            ];

            $program = Program::create($programData);

            // Optional: Social Protection
            if ($request->filled(['differently_abled', 'document', 'scheme'])) {
                $socialProtectionData = [
                    'program_id' => $program->id,
                    'differently_abled' => $request->differently_abled,
                    'applied_document' => $request->document,
                    'applied_scheme' => $request->scheme,
                ];
                SocialProtection::create($socialProtectionData);
            }

            // Optional: Livelihood
            if ($request->filled(['differently_abled_beneficiary', 'support_beneficiary', 'support_describe'])) {
                $livelihoodData = [
                    'program_id' => $program->id,
                    'differently_abled' => $request->differently_abled_beneficiary,
                    'support' => $request->support_beneficiary,
                    'support_description' => $request->support_describe,
                ];
                Livelihoods::create($livelihoodData);
            }

            // Optional: Communities
            if (
                $request->filled([
                    'differently_abled_community',
                    'community_area',
                    'community_project',
                    'ngo',
                    'org_rep_name',
                    'org_type',
                    'work_period',
                    'no_member',
                    'org_focus_work_area',
                    'community_support',
                    'community_suport2',
                    'community_support_describe'
                ])
            ) {
                $communitiesData = [
                    'program_id' => $program->id,
                    'differently_abled' => $request->differently_abled_community,
                    'area' => $request->community_area,
                    'project' => $request->community_project,
                    'ngo_shg_cooperative_fpo_other' => $request->ngo,
                    'org_representative_name' => $request->org_rep_name,
                    'org_type' => $request->org_type,
                    'working_period' => $request->work_period,
                    'no_of_members' => $request->no_member,
                    'org_focused_working_area' => $request->org_focus_work_area,
                    'support' => $request->community_support,
                    'community_support' => $request->community_suport2,
                    'support_description' => $request->community_support_describe,
                ];
                Communities::create($communitiesData);
            }

            // Optional: Digital Literacy
            if ($request->filled(['differently_abled_digital', 'area', 'session_conduct'])) {
                $digitalLiteracyData = [
                    'program_id' => $program->id,
                    'differently_abled' => $request->differently_abled_digital,
                    'area' => $request->area,
                    'type_of_sessions' => $request->session_conduct,
                ];
                DigitalLiteracies::create($digitalLiteracyData);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Program Created Successfully');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function deleteProgram(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $programData = Program::findOrFail($id);

            SocialProtection::where('program_id', $programData->id)->delete();
            Livelihoods::where('program_id', $programData->id)->delete();
            Communities::where('program_id', $programData->id)->delete();
            DigitalLiteracies::where('program_id', $programData->id)->delete();

         
            $programData->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Program deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error deleting Program: ' . $th->getMessage());
        }
    }

}
