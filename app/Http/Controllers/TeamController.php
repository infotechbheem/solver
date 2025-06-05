<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function teamMemberRegistration()
    {
        $title = "Team Registration";
        return view('hr-department.team.team-member-registration', compact('title'));
    }


    public function storeRegistration(Request $request)
    {

        // dd($request->all());

        try {
            DB::beginTransaction();

            // Generate unique team_id (5 or 6 chars)
            do {
                $teamId = Str::upper(Str::random(6));
                $exists = Team::where('team_id', $teamId)->exists();
            } while ($exists);

            // Store files
            $photoPath = $request->file('photoUpload') ? $request->file('photoUpload')->store('photos', 'public') : null;
            $resumePath = $request->file('resumeUpload') ? $request->file('resumeUpload')->store('resumes', 'public') : null;
            $adharPath = $request->file('adharUpload') ? $request->file('adharUpload')->store('aadhars', 'public') : null;
            $panPath = $request->file('panUpload') ? $request->file('panUpload')->store('pan_cards', 'public') : null;
            $marksheetPath = $request->file('marksheetUpload') ? $request->file('marksheetUpload')->store('marksheets', 'public') : null;

            // Prepare data for insertion
            $teamData = [
                'team_id' => $teamId,
                'full_name' => $request->name,
                'fathers_name' => $request->father_name,
                'mothers_name' => $request->mother_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'employment_type' => $request->employment_type,
                'position_type' => $request->position_type,
                'qualification' => $request->qualification,
                'college_university' => $request->college_university,
                'experience' => $request->experience,
                'marital_status' => $request->marital_status,
                'emergency_contact_number' => $request->emergency_contact,
                'date_of_joining' => $request->doj,
                'designation' => $request->designation,
                'department' => $request->department,
                'payment_type' => $request->payment_type,
                'basic_amount' => $request->basic_amt,
                'ctc_amount' => $request->ctc,
                'epf' => $request->epf,
                'esic' => $request->esic,
                'photo' => $photoPath,
                'cv_resume' => $resumePath,
                'aadhar_card' => $adharPath,
                'pan_card' => $panPath,
                'marksheet' => $marksheetPath,
                'address' => $request->address,
                'message' => $request->message,
            ];

            Team::create($teamData);

            DB::commit();

            return redirect()->back()->with('success', 'Team Registered successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to save registration: ' . $e->getMessage());
        }
    }


    public function allTeamMember()
    {
        $teams = Team::paginate(10);

        $title = "All Team Member ";
        return view('hr-department.team.all-team-member', compact('title', 'teams'));
    }
    public function teamMemberDetails($id)
    {
        $id = decrypt($id);
        $teamDetail = Team::where('id', $id)->first();

        $title = "Team Member details ";
        return view('hr-department.team.team-member-details', compact('title','teamDetail'));
    }
    public function editTeamMember($id)
    {
        $id = decrypt($id);
        $teams = Team::where('id', $id)->first();

        $title = "Update Team Member ";
        return view('hr-department.team.update-team-member', compact('title', 'teams'));
    }

    public function UpdateTeamMember(Request $request, $id)
    {

        try {

            DB::beginTransaction();

            $team = Team::findOrFail($id);

            // File handling
            $photoPath = $request->file('photoUpload') ? $request->file('photoUpload')->store('photos', 'public') : $team->photo;
            $resumePath = $request->file('resumeUpload') ? $request->file('resumeUpload')->store('resumes', 'public') : $team->cv_resume;
            $adharPath = $request->file('adharUpload') ? $request->file('adharUpload')->store('aadhars', 'public') : $team->aadhar_card;
            $panPath = $request->file('panUpload') ? $request->file('panUpload')->store('pan_cards', 'public') : $team->pan_card;
            $marksheetPath = $request->file('marksheetUpload') ? $request->file('marksheetUpload')->store('marksheets', 'public') : $team->marksheet;

            $team->update([
                'full_name' => $request->name,
                'fathers_name' => $request->father_name,
                'mothers_name' => $request->mother_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'employment_type' => $request->employment_type,
                'position_type' => $request->position_type,
                'qualification' => $request->qualification,
                'college_university' => $request->college_university,
                'experience' => $request->experience,
                'marital_status' => $request->marital_status,
                'emergency_contact_number' => $request->emergency_contact,
                'date_of_joining' => $request->doj,
                'designation' => $request->designation,
                'department' => $request->department,
                'payment_type' => $request->payment_type,
                'basic_amount' => $request->basic_amt,
                'ctc_amount' => $request->ctc,
                'epf' => $request->epf,
                'esic' => $request->esic,
                'photo' => $photoPath,
                'cv_resume' => $resumePath,
                'aadhar_card' => $adharPath,
                'pan_card' => $panPath,
                'marksheet' => $marksheetPath,
                'address' => $request->address,
                'message' => $request->message,
            ]);

            DB::commit();
           return redirect()->to(url('/hr-department/team/all-team-member'))->with('success', 'Team Member updated successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update registration: ' . $e->getMessage());
        }
    }

    public function deleteTeamMember(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $teamData = Team::findOrFail($id);

            $teamData->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Team Member deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error deleting Team Member: ' . $th->getMessage());
        }
    }
}
