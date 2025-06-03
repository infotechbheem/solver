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
        $request->validate([
            'employment_type'      => 'required|string|in:permanent,temporary,contract',
            'position_type'        => 'required|string|in:employee,manager,intern',
            'name'                 => 'required|string|max:255',
            'father_name'          => 'nullable|string|max:255',
            'mother_name'          => 'nullable|string|max:255',
            'email'                => 'required|email|max:255|unique:teams,email',
            'phone_number'         => 'required|string|max:20',
            'dob'                  => 'required|date|before:today',
            'gender'               => 'required|string|in:Male,Female,Other',
            'qualification'        => 'nullable|string|max:100',
            'college_university'   => 'nullable|string|max:255',
            'experience'           => 'nullable|string|max:100',
            'marital_status'       => 'nullable|string|in:single,married,divorced,widowed',
            'emergency_contact'    => 'nullable|string|max:20',
            'doj'                  => 'required|date|after_or_equal:dob',
            'designation'          => 'nullable|string|max:100',
            'department'           => 'nullable|string|max:100',
            'payment_type'         => 'nullable|string|in:salary,wages,commission',
            'basic_amt'            => 'nullable|numeric|min:0',
            'ctc'                  => 'nullable|numeric|min:0',
            'epf'                  => 'nullable|numeric|min:0',
            'esic'                 => 'nullable|numeric|min:0',
            'address'              => 'nullable|string|max:500',
            'message'              => 'nullable|string|max:1000',

            // File validations
            'photoUpload'          => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:4096',
            'resumeUpload'         => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:4096',
            'adharUpload'          => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:4096',
            'panUpload'            => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:4096',
            'marksheetUpload'      => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:4096',
        ]);

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
        $title = "All Team Member ";
        return view('hr-department.team.all-team-member', compact('title'));
    }
    public function teamMemberDetails()
    {
        $title = "Team Member details ";
        return view('hr-department.team.team-member-details', compact('title'));
    }
    public function updateTeamMember()
    {
        $title = "Update Team Member ";
        return view('hr-department.team.update-team-member', compact('title'));
    }
}
