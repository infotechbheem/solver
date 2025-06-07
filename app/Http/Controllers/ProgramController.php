<?php

namespace App\Http\Controllers;

use App\Models\Livelihoods;
use App\Models\Program;
use App\Models\Communities;
use App\Models\DigitalLiteracies;
use App\Models\SocialProtection;
use App\Models\Deliverables;
use App\Models\OverallTargetvsDeliverables;
use App\Imports\OverallTargetImport;
use App\Imports\ProgressTrackImport;
use App\Models\ProgressTracker;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function addProgram()
    {
        $team = Team::get();

        $title = "Add Program";
        return view('program-department.add-program', compact('title','team'));
    }
    public function viewProgram()
    {
        $programs = Program::with('team','livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->paginate(10);

        $stateWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create a state-wise count array
        $stateCounts = [];

        foreach ($stateWisePercentage as $stateWise) {
            $state = $stateWise->state;

            $totalItems =
                $stateWise->livelihoods->count() +
                $stateWise->digitalLiteracies->count() +
                $stateWise->communities->count() +
                $stateWise->socialProtections->count();

            if (!isset($stateCounts[$state])) {
                $stateCounts[$state] = 0;
            }

            $stateCounts[$state] += $totalItems;
        }

        // Calculate total entries
        $totalEntries = array_sum($stateCounts);


        // Prepare data for chart
        $chartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($stateCounts as $state => $count) {
            $chartData['labels'][] = $state;
            $chartData['data'][] = round(($count / $totalEntries) * 100, 2);
        }

        $districtWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create a district-wise count array
        $districtCounts = [];

        foreach ($districtWisePercentage as $program) {
            $district = $program->district;

            $totalItems =
                $program->livelihoods->count() +
                $program->digitalLiteracies->count() +
                $program->communities->count() +
                $program->socialProtections->count();

            if (!isset($districtCounts[$district])) {
                $districtCounts[$district] = 0;
            }

            $districtCounts[$district] += $totalItems;
        }

        // Calculate total entries
        $totalDistrictEntries = array_sum($districtCounts);

        // Prepare data for district chart
        $districtChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($districtCounts as $district => $count) {
            $districtChartData['labels'][] = $district;
            $districtChartData['data'][] = round(($count / $totalDistrictEntries) * 100, 2);
        }

        // Create a area-wise count array
        $areaWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an area-wise count array
        $areaCounts = [];

        foreach ($areaWisePercentage as $program) {
            // Loop through all related items and collect area counts

            foreach ($program->digitalLiteracies as $item) {
                $area = $item->area ?? 'Unknown';
                $areaCounts[$area] = ($areaCounts[$area] ?? 0) + 1;
            }

            foreach ($program->communities as $item) {
                $area = $item->area ?? 'Unknown';
                $areaCounts[$area] = ($areaCounts[$area] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalAreaEntries = array_sum($areaCounts);

        // Prepare data for area chart
        $areaChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($areaCounts as $area => $count) {
            $areaChartData['labels'][] = $area;
            $areaChartData['data'][] = round(($count / $totalAreaEntries) * 100, 2);
        }

        // Create a project-wise count array
        $projectWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an project-wise count array
        $projectCounts = [];

        foreach ($projectWisePercentage as $program) {
            // Loop through all related items and collect project counts

            $project = $program->project ?? null;
            if ($project) {
                $projectCounts[$project] = ($projectCounts[$project] ?? 0) + 1;
            } else {
                $projectCounts['Unknown'] = ($projectCounts['Unknown'] ?? 0) + 1;
            }

            foreach ($program->communities as $item) {
                $project = $item->project ?? 'Unknown';
                $projectCounts[$project] = ($projectCounts[$project] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalprojectEntries = array_sum($projectCounts);

        // Prepare data for project chart
        $projectChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($projectCounts as $project => $count) {
            $projectChartData['labels'][] = $project;
            $projectChartData['data'][] = round(($count / $totalprojectEntries) * 100, 2);
        }

        // Create a support_partner-wise count array
        $supportPartnerWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an support_partner-wise count array
        $support_partnerCounts = [];

        foreach ($supportPartnerWisePercentage as $program) {
            // Loop through all related items and collect support_partner counts

            $support_partner = $program->support_partner ?? null;
            if ($support_partner) {
                $support_partnerCounts[$support_partner] = ($support_partnerCounts[$support_partner] ?? 0) + 1;
            } else {
                $support_partnerCounts['Unknown'] = ($support_partnerCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalsupport_partnerEntries = array_sum($support_partnerCounts);

        // Prepare data for support_partner chart
        $support_partnerChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($support_partnerCounts as $support_partner => $count) {
            $support_partnerChartData['labels'][] = $support_partner;
            $support_partnerChartData['data'][] = round(($count / $totalsupport_partnerEntries) * 100, 2);
        }

        // Create a team_member_name-wise count array
        $teamMemberNameWisePercentage = Program::with('team','livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an team_member_name-wise count array
        $team_member_nameCounts = [];

        foreach ($teamMemberNameWisePercentage as $program) {
            // Loop through all related items and collect team_member_name counts

            $team_member_name = $program->team->full_name ?? null;
            if ($team_member_name) {
                $team_member_nameCounts[$team_member_name] = ($team_member_nameCounts[$team_member_name] ?? 0) + 1;
            } else {
                $team_member_nameCounts['Unknown'] = ($team_member_nameCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalteam_member_nameEntries = array_sum($team_member_nameCounts);

        // Prepare data for team_member_name chart
        $team_member_nameChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($team_member_nameCounts as $team_member_name => $count) {
            $team_member_nameChartData['labels'][] = $team_member_name;
            $team_member_nameChartData['data'][] = round(($count / $totalteam_member_nameEntries) * 100, 2);
        }

        // Create a age-wise count array
        $ageWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an age-wise count array
        $ageCounts = [];

        foreach ($ageWisePercentage as $program) {
            // Loop through all related items and collect age counts

            $age = $program->age ?? null;
            if ($age) {
                $ageCounts[$age] = ($ageCounts[$age] ?? 0) + 1;
            } else {
                $ageCounts['Unknown'] = ($ageCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalageEntries = array_sum($ageCounts);

        // Prepare data for age chart
        $ageChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($ageCounts as $age => $count) {
            $ageChartData['labels'][] = $age;
            $ageChartData['data'][] = round(($count / $totalageEntries) * 100, 2);
        }

        // Create a gender-wise count array
        $genderWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an gender-wise count array
        $genderCounts = [];

        foreach ($genderWisePercentage as $program) {
            // Loop through all related items and collect age counts

            $gender = $program->gender ?? null;
            if ($gender) {
                $genderCounts[$gender] = ($genderCounts[$gender] ?? 0) + 1;
            } else {
                $genderCounts['Unknown'] = ($genderCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalgenderEntries = array_sum($genderCounts);

        // Prepare data for gender chart
        $genderChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($genderCounts as $gender => $count) {
            $genderChartData['labels'][] = $gender;
            $genderChartData['data'][] = round(($count / $totalgenderEntries) * 100, 2);
        }

        // Create a caste-wise count array
        $casteWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an caste-wise count array
        $casteCounts = [];

        foreach ($casteWisePercentage as $program) {
            // Loop through all related items and collect age counts

            $caste = $program->caste ?? null;
            if ($caste) {
                $casteCounts[$caste] = ($casteCounts[$caste] ?? 0) + 1;
            } else {
                $casteCounts['Unknown'] = ($casteCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalcasteEntries = array_sum($casteCounts);

        // Prepare data for caste chart
        $casteChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($casteCounts as $caste => $count) {
            $casteChartData['labels'][] = $caste;
            $casteChartData['data'][] = round(($count / $totalcasteEntries) * 100, 2);
        }

        // Create a religion-wise count array
        $religionWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an religion-wise count array
        $religionCounts = [];

        foreach ($religionWisePercentage as $program) {
            // Loop through all related items and collect age counts

            $religion = $program->religion ?? null;
            if ($religion) {
                $religionCounts[$religion] = ($religionCounts[$religion] ?? 0) + 1;
            } else {
                $religionCounts['Unknown'] = ($religionCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalreligionEntries = array_sum($religionCounts);

        // Prepare data for religion chart
        $religionChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($religionCounts as $religion => $count) {
            $religionChartData['labels'][] = $religion;
            $religionChartData['data'][] = round(($count / $totalreligionEntries) * 100, 2);
        }
        // Create a occupation-wise count array
        $occupationWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an occupation-wise count array
        $occupationCounts = [];

        foreach ($occupationWisePercentage as $program) {
            // Loop through all related items and collect age counts

            $occupation = $program->occupation ?? null;
            if ($occupation) {
                $occupationCounts[$occupation] = ($occupationCounts[$occupation] ?? 0) + 1;
            } else {
                $occupationCounts['Unknown'] = ($occupationCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totaloccupationEntries = array_sum($occupationCounts);

        // Prepare data for occupation chart
        $occupationChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($occupationCounts as $occupation => $count) {
            $occupationChartData['labels'][] = $occupation;
            $occupationChartData['data'][] = round(($count / $totaloccupationEntries) * 100, 2);
        }
        // Create a familyIncome-wise count array
        $familyIncomeWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an familyIncome-wise count array
        $familyIncomeCounts = [];

        foreach ($familyIncomeWisePercentage as $program) {
            // Loop through all related items and collect age counts

            $familyIncome = $program->family_income ?? null;
            if ($familyIncome) {
                $familyIncomeCounts[$familyIncome] = ($familyIncomeCounts[$familyIncome] ?? 0) + 1;
            } else {
                $familyIncomeCounts['Unknown'] = ($familyIncomeCounts['Unknown'] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalfamilyIncomeEntries = array_sum($familyIncomeCounts);

        // Prepare data for familyIncome chart
        $familyIncomeChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($familyIncomeCounts as $familyIncome => $count) {
            $familyIncomeChartData['labels'][] = $familyIncome;
            $familyIncomeChartData['data'][] = round(($count / $totalfamilyIncomeEntries) * 100, 2);
        }

        // Create a differentlyAbled-wise count array
        $differentlyAbledWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an differentlyAbled-wise count array
        $differentlyAbledCounts = [];

        foreach ($differentlyAbledWisePercentage as $program) {
            // Loop through all related items and collect differentlyAbled counts

            foreach ($program->livelihoods as $item) {
                $differentlyAbled = $item->differently_abled ?? 'Unknown';
                $differentlyAbledCounts[$differentlyAbled] = ($differentlyAbledCounts[$differentlyAbled] ?? 0) + 1;
            }
            foreach ($program->digitalLiteracies as $item) {
                $differentlyAbled = $item->differently_abled ?? 'Unknown';
                $differentlyAbledCounts[$differentlyAbled] = ($differentlyAbledCounts[$differentlyAbled] ?? 0) + 1;
            }
            foreach ($program->socialProtections as $item) {
                $differentlyAbled = $item->differently_abled ?? 'Unknown';
                $differentlyAbledCounts[$differentlyAbled] = ($differentlyAbledCounts[$differentlyAbled] ?? 0) + 1;
            }
            foreach ($program->communities as $item) {
                $differentlyAbled = $item->differently_abled ?? 'Unknown';
                $differentlyAbledCounts[$differentlyAbled] = ($differentlyAbledCounts[$differentlyAbled] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totaldifferentlyAbledEntries = array_sum($differentlyAbledCounts);

        // Prepare data for differentlyAbled chart
        $differentlyAbledChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($differentlyAbledCounts as $differentlyAbled => $count) {
            $differentlyAbledChartData['labels'][] = $differentlyAbled;
            $differentlyAbledChartData['data'][] = round(($count / $totaldifferentlyAbledEntries) * 100, 2);
        }

        // Create a support-wise count array
        $supportWisePercentage = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->get();

        // Create an support-wise count array
        $supportCounts = [];

        foreach ($supportWisePercentage as $program) {
            // Loop through all related items and collect support counts

            foreach ($program->livelihoods as $item) {
                $support = $item->support ?? 'Unknown';
                $supportCounts[$support] = ($supportCounts[$support] ?? 0) + 1;
            }
            foreach ($program->communities as $item) {
                $support = $item->community_support ?? 'Unknown';
                $supportCounts[$support] = ($supportCounts[$support] ?? 0) + 1;
            }
        }

        // Calculate total entries
        $totalsupportEntries = array_sum($supportCounts);

        // Prepare data for support chart
        $supportChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($supportCounts as $support => $count) {
            $supportChartData['labels'][] = $support;
            $supportChartData['data'][] = $count;
        }

        // Define colors array
        $chartColors = ['#FF6384', '#36A2EB', '#FFCD56', '#2ECC71', '#8E44AD', '#E67E22', '#1ABC9C', '#F39C12'];
        $title = "View Program";
        return view('program-department.view-program', compact('title', 'programs', 'chartData', 'chartColors', 'districtChartData', 'areaChartData', 'projectChartData', 'support_partnerChartData', 'team_member_nameChartData', 'ageChartData', 'genderChartData', 'casteChartData', 'religionChartData', 'occupationChartData', 'familyIncomeChartData', 'differentlyAbledChartData', 'supportChartData'));
    }
    public function viewProgramDetails($id)
    {
        $id = decrypt($id);
        $programDetails = Program::with('team','livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->where('id', $id)->first();

        $title = "View Program Details";
        return view('program-department.view-program-details', compact('title', 'programDetails'));
    }
    public function updateProgramDetails()
    {
        $title = "View Program Details";
        return view('program-department.view-program-details', compact('title'));
    }
    public function deliverabels()
    {
        $deliverables = Deliverables::paginate(10, ['*'], 'deliverables_page');
        $overallTarget = OverallTargetvsDeliverables::paginate(10, ['*'], 'overallTarget_page');
        $progressTrack = ProgressTracker::paginate(10, ['*'], 'progressTrack_page');

        $title = "Plan & Deliverables";
        return view('program-department.deliverabels', compact('title', 'deliverables', 'overallTarget', 'progressTrack'));
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

    public function editProgram(Request $request, $id)
    {
        $id = decrypt($id);
        $team = Team::get();
        $editProgram = Program::with('livelihoods', 'digitalLiteracies', 'communities', 'socialProtections')->where('id', $id)->first();
        $title = 'Edit Program';

        return view('program-department.edit-program', compact('title', 'editProgram','team'));
    }

    public function updateProgram(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Find existing program
            $program = Program::findOrFail($id);

            // Update Program main data
            $program->update([
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
            ]);

            // Update or create Social Protection (taking first record)
            if ($request->filled(['differently_abled', 'document', 'scheme'])) {
                $socialProtection = $program->socialProtections()->first();
                if ($socialProtection) {
                    $socialProtection->update([
                        'differently_abled' => $request->differently_abled,
                        'applied_document' => $request->document,
                        'applied_scheme' => $request->scheme,
                    ]);
                } else {
                    $program->socialProtections()->create([
                        'differently_abled' => $request->differently_abled,
                        'applied_document' => $request->document,
                        'applied_scheme' => $request->scheme,
                    ]);
                }
            }

            // Update or create Livelihoods (taking first record)
            if ($request->filled(['differently_abled_beneficiary', 'support_beneficiary', 'support_describe'])) {
                $livelihood = $program->livelihoods()->first();
                if ($livelihood) {
                    $livelihood->update([
                        'differently_abled' => $request->differently_abled_beneficiary,
                        'support' => $request->support_beneficiary,
                        'support_description' => $request->support_describe,
                    ]);
                } else {
                    $program->livelihoods()->create([
                        'differently_abled' => $request->differently_abled_beneficiary,
                        'support' => $request->support_beneficiary,
                        'support_description' => $request->support_describe,
                    ]);
                }
            }

            // Update or create Communities (taking first record)
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
                $community = $program->communities()->first();
                if ($community) {
                    $community->update([
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
                    ]);
                } else {
                    $program->communities()->create([
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
                    ]);
                }
            }

            // Update or create Digital Literacies (taking first record)
            if ($request->filled(['differently_abled_digital', 'area', 'session_conduct'])) {
                $digitalLiteracy = $program->digitalLiteracies()->first();
                if ($digitalLiteracy) {
                    $digitalLiteracy->update([
                        'differently_abled' => $request->differently_abled_digital,
                        'area' => $request->area,
                        'type_of_sessions' => $request->session_conduct,
                    ]);
                } else {
                    $program->digitalLiteracies()->create([
                        'differently_abled' => $request->differently_abled_digital,
                        'area' => $request->area,
                        'type_of_sessions' => $request->session_conduct,
                    ]);
                }
            }

            DB::commit();

            // Redirect back to edit view (change route name as per your routes)
            return redirect()->route('our-program.view-program')
                ->with('success', 'Program Updated Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function storeDeliverables(Request $request)
    {
        try {
            DB::beginTransaction();

            // First table: programs (always inserted)
            $deliverableData = [
                'program' => $request->program,
                'project_name' => $request->project_name,
                'project_title' => $request->project_title,
                'donar_name' => $request->donar_name,
                'project_duration_from' => $request->project_duration_from,
                'project_duration_to' => $request->project_duration_to,
                'project_location' => $request->project_location,
                'no_of_month' => $request->no_of_month,
                'month' => $request->month,
                'particular' => $request->particular,
                'target' => $request->target,
                'description' => $request->description,
            ];

            $deliverables = Deliverables::create($deliverableData);

            DB::commit();
            return redirect()->back()->with('success', 'Deliverables Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function deleteDeliverables(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $deliverableDelete = Deliverables::findOrFail($id);

            $deliverableDelete->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Deliverables deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error deleting Deliverables: ' . $th->getMessage());
        }
    }

    public function updateDeliverables(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Find the existing deliverable by ID
            $deliverable = Deliverables::findOrFail($id);

            // Prepare updated data
            $deliverableData = [
                'program' => $request->program,
                'project_name' => $request->project_name,
                'project_title' => $request->project_title,
                'donar_name' => $request->donar_name,
                'project_duration_from' => $request->project_duration_from,
                'project_duration_to' => $request->project_duration_to,
                'project_location' => $request->project_location,
                'no_of_month' => $request->no_of_month,
                'month' => $request->month,
                'particular' => $request->particular,
                'target' => $request->target,
                'description' => $request->description,
            ];

            // Update the existing deliverable
            $deliverable->update($deliverableData);

            DB::commit();
            return redirect()->back()->with('success', 'Deliverables Updated Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function overallTargetImport(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx,xlsm',
        ]);

        try {
            DB::beginTransaction();

            Excel::import(new OverallTargetImport, $request->file('import_file'));

            DB::commit();

            return redirect()->back()->with('success', 'File Imported Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function progressTrakImport(Request $request)
    {
        $request->validate([
            'progressFile' => 'required|file|mimes:xls,xlsx,xlsm',
        ]);

        try {
            DB::beginTransaction();

            Excel::import(new progressTrackImport, $request->file('progressFile'));

            DB::commit();

            return redirect()->back()->with('success', 'File Imported Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
