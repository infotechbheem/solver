<?php

namespace App\Http\Controllers;

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
        $title = "View Program";
        return view('program-department.view-program', compact('title'));
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
}
