<?php

use App\Models\User;
use App\Models\LatterBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Exports\IncomeExport;
use App\Exports\ExpenditureExport;
use App\Exports\ProgramExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/check-email-availability', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if ($user) {
        return response()->json(['isEmailAvailable' => true, 'message' => 'Email already in- use.'], 200);
    }

    return response()->json(['isEmailAvailable' => false, 'message' => 'Email available.'], 200);
})->name('check-email-availability');

// export income

Route::get('/export-income', function (Request $request) {
    $filters = [
        'income_type' => $request->income_type,
        'donation_type' => $request->donation_type,
        'project_type' => $request->project_type,
    ];
    return Excel::download(new IncomeExport($filters), 'income_data.xlsx');
})->name('income.export');

// export expenditure

Route::get('/export-expenditure', function (Request $request) {
    $filters = [
        'expenseSector' => $request->expenseSector,
        'expenseType' => $request->expenseType,
        'administrative_expense' => $request->administrative_expense,
    ];
    return Excel::download(new ExpenditureExport($filters), 'expenditure_data.xlsx');
})->name('expenditure.export');

// export program

Route::get('/export-program', function (Request $request) {
    $filters = [
        'program_type' => $request->program_type,
    ];
    return Excel::download(new ProgramExport($filters), 'program_data.xlsx');
})->name('program.export');
