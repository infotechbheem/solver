<?php

use App\Http\Controllers\CSRController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot_password', function () {
    return view('forgot_password');
});

Route::middleware(['admin_auth', 'clear_cache'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/auth/admin/dashboard', 'adminDashboard')->name('admin.dashboard');
        Route::get('/admin-logout', 'logout')->name('admin.logout');
    });

    //==================HR DEPARTMENT START=================
    Route::controller(TeamController::class)->prefix('/hr-department/team')->group(function () {
        Route::get('/team-member-registration', 'teamMemberRegistration')->name('our-team.team-member-registration');
        Route::post('/store-registration', 'storeRegistration')->name('store-team-member-registration');
        Route::get('/all-team-member', 'allTeamMember')->name('our-team.all-team-member');
        Route::get('/team-member-details/{id}', 'teamMemberDetails')->name('our-team.team-member-details');
        Route::get('/update-team-member/{id}', 'editTeamMember')->name('our-team.update-team-member');
        Route::delete('/delete-team-member/{id}', 'deleteTeamMember')->name('our-team.delete-team-member');
        Route::put('/update-team-member-registration/{id}', 'UpdateTeamMember')->name('our-team.update-team-member-registration');
    });
    //=================HR DEPARTMENT END=====================


    //=================PROGRAM DEPARTMENT START=====================
    Route::controller(ProgramController::class)->group(function () {
        Route::get('/program-department/add-program', 'addProgram')->name('our-program.add-program');
        Route::get('/program-department/view-program', 'viewProgram')->name(name: 'our-program.view-program');
        Route::get('/program-department/view-program-details/{id}', 'viewProgramDetails')->name('our-program.view-program-details');
        Route::get('/program-department/update-program-details', 'updateProgramDetails')->name('our-program.update-program-details');
        Route::get('/program-department/deliverabels', 'deliverabels')->name('our-program.deliverabels');

        // store program
        Route::post('/store-program', 'storeProgram')->name('store-program');

        // delete program
        Route::delete('/delete-program/{id}', 'deleteProgram')->name('delete-program');

        // edit program
        Route::get('/edit-program/{id}', 'editProgram')->name('edit-program');

        // update program
        Route::put('/update-program/{id}', 'updateProgram')->name('update-program');

        // store deliverables
        Route::post('/store-deliverables', 'storeDeliverables')->name('store-deliverables');

        // delete deliverables
        Route::delete('/delete-deliverables/{id}', 'deleteDeliverables')->name('delete-deliverables');

        // update deliverables
        Route::put('/update-deliverables/{id}', 'updateDeliverables')->name('update-deliverables');

        // import
        Route::post('/overall-target-import', 'overallTargetImport')->name('overall-target-import');
        // import
        Route::post('/progress-track-import', 'progressTrakImport')->name('progress-track-import');
    });
    //=================PROGRAM DEPARTMENT END=====================


    //==================USER DEPARTMENT START========================
    Route::controller(UserController::class)->group(function () {
        Route::get('/admin-department/create-user-department', 'createUserDepartment')->name('create-user-department');
        Route::post('/admin-department/store-user-type', 'storeUserType')->name('store.user-department');
        Route::post('/admin-department/store-user-department', 'storeUserDepartment')->name('store-user-department');

        Route::get('/admin-department/delete-user-type/{id}', 'deleteUserType')->name('delete.user-type');
        Route::get('/admin-department/delete-user-department/{id}', 'deleteDepartment')->name('delete.user-department');

        Route::post('/admin-department/store-user-registration', 'storeUserRegistration')->name('store-user-registration');
        Route::get('/admin-department/view-user', 'viewUser')->name('view-user');
        Route::get('/admin-department/user-status-change/{id}', 'userStatusChange')->name('user-status-change');
        Route::get('/admin-department/user-access-control', 'userAccessControl')->name('user-access-control');

        Route::get('/admin-department/letter-box', 'letterBox')->name('letter-box');
        Route::post('/admin-department/store-letter-box', 'storeLetterBox')->name('store-letter-box');

        //ajax  for email validation
        Route::post('/check-email-exists', 'checkEmailExists')->name('check.email.exists');

        // delete letter box
        Route::delete('/letter-box/{id}', 'destroy')->name('letter-box.destroy');
        Route::get('/get-letterbox-data/{id}', 'getData');
        Route::put('/update-letterbox', 'update_letterbox')->name('update-letterbox');

        Route::post('/assign-permission-to-role', 'assignPermissionsToRole')->name('assign-permission-to-role');
    });

    //==================USER DEPARTMENT END==========================


    //===================CSR DEPARTMENT START=========================

    Route::controller(CSRController::class)->group(function () {
        Route::post('/store-csr-partner', 'storeCSRPartner')->name('store.csr-partner');
        Route::post('/store-partner-orgniation', 'storePartnerOrgnization')->name('store.partner-orgnization');
        Route::get('/delete-csr-partner/{id}', 'deleteCSRPartner')->name('delete-csr-partner');
        Route::get('/delete-partner-orgnization/{id}', 'deletePartnerOrgnization')->name('delete.partner-or-orgnization');
    });

    //===================CSR DEPARTMENT END===========================



    // attendance section start
    Route::get('/hr-department/attendance/view-attendance', function () {
        $title = "View Attendance ";
        return view('hr-department.attendance.view-attendance', compact('title'));
    })->name('our-team.view-attendance');
    // attendance section end




    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');


    Route::get('/profile', function () {
        return view('profile');
    });

    // admin section start








    // auth program section start
    Route::get('/auth/program-department/dashboard', function () {
        return view('auth.program-department.dashboard');
    })->name('auth-program-department.dashboard');
    Route::get('/auth/program-department/add-program', function () {
        $title = "Add Program";
        return view('auth.program-department.add-program', compact('title'));
    })->name('auth-program-department.add-program');
    Route::get('/auth/program-department/view-program', function () {

        $title = "View Program";
        return view('auth.program-department.view-program', compact('title'));
    })->name('auth-program-department.view-program');

    Route::get('/auth/program-department/deliverabels', function () {
        $title = "Plan & deliverabels";
        return view('auth.program-department.deliverabels', compact('title'));
    })->name('auth-program-department.deliverabels');
    // auth program section end



    // finannce department section start
    // income section
    Route::controller(IncomeController::class)->prefix('/finance-department/income')->group(function () {
        Route::get('/add-income', 'incomeAdd')->name('income.add-income');
        Route::post('/store-income', 'incomeStore')->name('store-income');
        Route::get('/view-income', 'incomeView')->name('income.view-income');
        Route::delete('/delete-income/{id}', 'incomeDelete')->name('delete-income');
        Route::get('/income-details/{id}', 'incomeDetails')->name('income.income-details');
        Route::get('/update-income-details/{id}', 'editIncome')->name('income.update-income-details');
        Route::put('/update-income/{id}', 'updateIncome')->name('update-income');
    });
    // income section
    Route::get('/finance-department/income/total-income', function () {
        $title = "Total Income";
        return view('finance-department.income.total-income', compact('title'));
    })->name('income.total-income');
    Route::get('/finance-department/income/invoice-setting', function () {
        $title = "Invoice Setting";
        return view('finance-department.income.invoice-setting', compact('title'));
    })->name('income.invoice-setting');

    // Expenditure section
    Route::controller(ExpenditureController::class)->prefix('/finance-department/expenditure')->group(function () {
        Route::get('/add-expenditure', 'expenditureAdd')->name('expenditure.add-expenditure');
        Route::post('/store-expenditure', 'expenditureStore')->name('store-expenditure');
        Route::get('/view-expenditure', 'expenditureView')->name('expenditure.view-expenditure');
        Route::delete('/expenditure-delete/{id}', 'expenditureDelete')->name('expenditure-delete');
        Route::get('/view-expenditure-details/{id}', 'expenditureDetails')->name('expenditure.view-expenditure-details');
        Route::post('/filter-record', 'expenditureFilterList')->name('filter-record');
        Route::get('/update-expenditure-details/{id}', 'editExpenditure')->name('expenditure.update-expenditure-details');
        Route::put('/update-expenditure/{id}', 'updateExpenditure')->name('update-expenditure');
    });


    Route::get('/finance-department/expenditure/total-expense', function () {
        $title = "Total Expense";
        return view('finance-department.expenditure.total-expense', compact('title'));
    })->name('expenditure.total-expense');
    // finannce department section end



    // auth  human resource dashboard section start
    Route::get('/auth/human-resource/dashboard', function () {
        return view('auth.human-resource.dashboard');
    })->name('auth-human-resource.dashboard');

    Route::get('/auth/human-resource/team/team-member-registration', function () {
        $title = "Team Member Registartion";
        return view('auth.human-resource.team.team-member-registration', compact('title'));
    })->name('auth-human-resource.our-team.team-member-registration');
    Route::get('/auth/human-resource/team/all-team-member', function () {
        $title = "All Team Member ";
        return view('auth.human-resource.team.all-team-member', compact('title'));
    })->name('auth-human-resource.our-team.all-team-member');
    Route::get('/auth/human-resource/team/team-member-details', function () {
        $title = "Team Member Deatils";
        return view('auth.human-resource.team.team-member-details', compact('title'));
    })->name('auth-human-resource.our-team.team-member-details');
    Route::get('/auth/human-resource/team/view-attendance', function () {
        $title = "View Attendance";
        return view('auth.human-resource.team.view-attendance', compact('title'));
    })->name('auth-human-resource.our-team.view-attendance');
    // auth  human resource dashboard section end



    // auth finace department dashboard section start
    Route::get('/auth/finance/dashboard', function () {
        return view('auth.finance.dashboard');
    })->name('auth-finance.dashboard');
    Route::get('/auth/finance/expenditure/add-expenditure', function () {
        $title = "Add Expenditure";
        return view('auth.finance.expenditure.add-expenditure', compact('title'));
    })->name('auth-finance.expenditure.add-expenditure');
    Route::get('/auth/finance/expenditure/view-expenditure', function () {
        $title = "View Expenditure";
        return view('auth.finance.expenditure.view-expenditure', compact('title'));
    })->name('auth-finance.expenditure.view-expenditure');
    Route::get('/auth/finance/expenditure/total-expense', function () {
        $title = "Total Expense";
        return view('auth.finance.expenditure.total-expense', compact('title'));
    })->name('auth-finance.expenditure.total-expense');
    // auth finace department dashboard section end
    Route::get('/auth/finance/income/total-income', function () {
        $title = "Total income";
        return view('auth.finance.income.total-income', compact('title'));
    })->name('auth-finance.expenditure.total-income');
});
