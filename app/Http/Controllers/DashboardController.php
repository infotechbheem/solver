<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Income;
use App\Models\Expenditure;
use App\Models\Team;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $totalIncome = Income::sum('amount_received');
        $totalExpenditure = Expenditure::sum('sub_total_amount');
        $totalMember = Team::count();

        return view('index', compact('totalIncome','totalExpenditure','totalMember'));
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logout successfully!!');
        }
    }
}
