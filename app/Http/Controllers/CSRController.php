<?php

namespace App\Http\Controllers;

use App\Mail\SendCSRRegistrationMail;
use App\Mail\SendPartnerRegistrationMail;
use App\Models\CSRPartner;
use App\Models\PartnerOrgnization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class CSRController extends Controller
{
    public function storeCSRPartner(Request $request)
    {

        try {
            DB::beginTransaction();
            $csr_id = time();

            $requestAll = [
                'csr_id' => $csr_id,
                'company_name' => $request->company_name,
                'contact_person_name' => $request->name,
                'phone_number' => $request->phone_number,
                'designation' => $request->designation,
                'email' => $request->email,
            ];

            $csrUser = User::create([
                'name' => $request->company_name,
                'username' => $csr_id,
                'email' => $request->email,
                'password' => $request->password,
                'status' => true,
            ]);

            $csr = Role::createOrFirst(['name' => 'csr_partner']);

            $csrUser->assignRole($csr);

            $csrregistrationResponse = CSRPartner::create($requestAll);

            if ($csrUser && $csrregistrationResponse) {

                $details = [
                    'user_id' => $csr_id,
                    'password' => $request->password
                ];

                Mail::to($request->email)->send(new SendCSRRegistrationMail($details));

                DB::commit();
                return redirect()->back()->with('success', 'Registration successfull');
            }
            DB::rollBack();
            return redirect()->back()->with('error', 'Internal Server Error');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function storePartnerOrgnization(Request $request)
    {

        try {
            DB::beginTransaction();
            $partner_id = time();

            $requestAll = [
                'partner_id' => $partner_id,
                'company/ngo_name' => $request->company_ngo_name,
                'contact_person_name' => $request->contact_person_name,
                'phone_number' => $request->phone_number,
                'designation' => $request->designationPartner,
                'email' => $request->email,
            ];

            $csrUser = User::create([
                'name' => $request->company_ngo_name,
                'username' => $partner_id,
                'email' => $request->email,
                'password' => $request->password,
                'status' => true,
            ]);

            $csr = Role::createOrFirst(['name' => 'partner_or_ngo']);

            $csrUser->assignRole($csr);

            $csrregistrationResponse = PartnerOrgnization::create($requestAll);

            if ($csrUser && $csrregistrationResponse) {

                $details = [
                    'user_id' => $partner_id,
                    'password' => $request->password,
                    'organization_name' => $request->company_ngo_name,
                    'contact_person_name' => $request->contact_person_name,
                    'designation' => $request->designationPartner,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,

                ];

                Mail::to($request->email)->send(new SendPartnerRegistrationMail($details));

                DB::commit();
                return redirect()->back()->with('success', 'Registration successfull');
            }
            DB::rollBack();
            return redirect()->back()->with('error', 'Internal Server Error');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function deleteCSRPartner($id)
    {
        try {
            DB::beginTransaction();

            $deleteResponse = CSRPartner::where('csr_id', $id)->delete();

            $mainDelete = User::where('username', $id)->delete();

            if ($deleteResponse && $mainDelete) {
                DB::commit();
                return redirect()->back()->with('success', "Data Deleted Successfully!!");
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function deletePartnerOrgnization($id)
    {

        try {
            DB::beginTransaction();

            $deleteResponse = PartnerOrgnization::where('partner_id', $id)->delete();

            $mainDelete = User::where('username', $id)->delete();

            if ($deleteResponse && $mainDelete) {
                DB::commit();
                return redirect()->back()->with('success', "Data Deleted Successfully!!");
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
