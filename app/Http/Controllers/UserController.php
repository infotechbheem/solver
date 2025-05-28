<?php

namespace App\Http\Controllers;

use App\Models\CSRPartner;
use App\Models\LatterBox;
use App\Models\PartnerOrgnization;
use App\Models\User;
use App\Models\UserDepartment;
use App\Models\UserDetails;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Models\Role;

use function Illuminate\Filesystem\join_paths;
use function PHPSTORM_META\type;

class UserController extends Controller
{
    public function createUserDepartment()
    {
        $userTypes = UserType::all();
        $userDepartment = UserDepartment::all();
        $CSRPartners = CSRPartner::all();
        $ParterOrOrganization = PartnerOrgnization::all();

        $title = "Create User Department";
        return view('admin-department.create-user-department', compact('title', 'userTypes', 'userDepartment', 'CSRPartners', 'ParterOrOrganization'));
    }

    public function storeUserType(Request $request)
    {
        try {
            DB::beginTransaction();

            $userType = [
                'user_type' => strtolower($request->user_type)
            ];

            $getUserType = UserType::where('user_type', strtolower($request->user_type))->exists();

            if ($getUserType) {
                DB::rollBack();
                return redirect()->back()->with('warning', 'This user type is already exist');
            }

            $response = UserType::create($userType);

            if ($response) {
                DB::commit();
                return redirect()->back()->with('success', 'User Type Created Successfully');
            }
            DB::rollBack();
            return redirect()->back()->with('error', 'Internal Server Error');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function storeUserDepartment(Request $request)
    {
        try {
            DB::beginTransaction();

            $userDepartment = [
                'user_department' => strtolower($request->user_department_name)
            ];

            $getUserDepartment = UserDepartment::where('user_department', strtolower($request->user_department_name))->exists();

            if ($getUserDepartment) {
                DB::rollBack();
                return redirect()->back()->with('warning', 'This user type is already exist');
            }

            $response = UserDepartment::create($userDepartment);

            if ($response) {
                DB::commit();
                return redirect()->back()->with('success', 'Department Created Successfully');
            }
            DB::rollBack();
            return redirect()->back()->with('error', 'Internal Server Error');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function deleteUserType($id)
    {
        if ($id) {
            $deleteResponse = UserType::where('id', $id)->delete();
            if ($deleteResponse) {
                return redirect()->back()->with('success', 'User Type Deleted successfully');
            }
            return redirect()->back()->with('error', 'failed to delete user type');
        }
        return redirect()->back()->with('error', 'User Type not found');
    }
    public function deleteDepartment($id)
    {
        if ($id) {
            $deleteResponse = UserDepartment::where('id', $id)->delete();
            if ($deleteResponse) {
                return redirect()->back()->with('success', 'User Department Deleted successfully');
            }
            return redirect()->back()->with('error', 'failed to delete user type');
        }
        return redirect()->back()->with('error', 'User Department not found');
    }

    public function storeUserRegistration(Request $request)
    {
        try {

            DB::beginTransaction();

            $checkUserEmail = User::where('email', $request->email)->exists();

            if ($checkUserEmail) {
                DB::rollBack();
                return redirect()->back()->with('sweet_warning', 'This email is already exist');
            }

            $user = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' =>  bcrypt($request->password),
                'address' => $request->address,
                'designation_id' => $request->designation,
                'department_id' => $request->department,
            ];

            $userResponse = UserDetails::create($user);

            $AuthUser = User::create([
                'name' => $request->name,
                'username' => rand(10000000, 99999999),
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => true,
            ]);

            $userResponseData = Role::createOrFirst(['name' => $request->designation]);

            $AuthUser->assignRole($userResponseData);

            if ($userResponse && $AuthUser) {
                DB::commit();
                return redirect()->back()->with('success', 'User Created Successfully');
            }
            DB::rollBack();
            return redirect()->back()->with('failed', 'Internal Server Error');
        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function viewUser()
    {
        $title = "View User";
        $departments = UserDepartment::all();
        $userTypes = UserType::all();

        $users = UserDetails::join('users', 'user_details.email', '=', 'users.email')
            ->with(['userType', 'department'])
            ->select('user_details.*', 'users.status as user_status', 'users.username')
            ->get();
        // dd($users);

        return view('admin-department.view-user', compact('title', 'departments', 'userTypes', 'users'));
    }
    public function userAccessControl()
    {
        $title = "User Access Control";
        return view('admin-department.user-access-control', compact('title'));
    }
    public function letterBox()
    {
        $title = "Letter Box";
        $departments = UserDepartment::all();

        $latterBoxes = LatterBox::with(['department'])->get();
        return view('admin-department.letter-box', compact('title', 'departments', 'latterBoxes'));
    }

    public function storeLetterBox(Request $request)
    {
        try {
            DB::beginTransaction();

            $requestData  = [
                'name' => $request->name,
                'subject' => $request->subject,
                'receipt_type' => $request->receipt_type,
                'date' => $request->date,
                'latter_box_type' => $request->letter_box,
                'latter_type' => $request->types_of_letter,
                'department_id' => $request->department_id,
                'latter/reference_no' => $request->reference_no,
                'description' => $request->description,
            ];

            $response = LatterBox::create($requestData);
            if ($response) {
                DB::commit();
                return redirect()->back()->with('success', 'Letter Box Created Successfully');
            }
            DB::rollBack();
            return redirect()->back()->with('error', 'Internal Server Error');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function userStatusChange($id)
    {
        $user = User::where('username', $id)->first();
        if ($user) {
            $user->status = !$user->status;
            $user->save();
            return redirect()->back()->with('success', 'User status updated successfully');
        }
        return redirect()->back()->with('error', 'User not found');
    }
}
