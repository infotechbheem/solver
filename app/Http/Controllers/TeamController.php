<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teamMemberRegistration()
    {
        $title = "Team Registration";
        return view('hr-department.team.team-member-registration', compact('title'));
    }


    public function storeTeamMemberRegistration(Request $request)
    {
        dd($request->all());
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
