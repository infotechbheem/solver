<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate request inputs
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|exists:roles,id', // Must be a valid role ID
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        try {
            $credentials = $request->only('username', 'password');
            $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if (Auth::attempt([$field => $credentials['username'], 'password' => $credentials['password']])) {
                $user = Auth::user();

                // 🔥 Fix: Force reload of roles and permissions
                app(PermissionRegistrar::class)->forgetCachedPermissions();
                $user->load('roles');

                $selectedRole = Role::find($request->role);
                if (!$selectedRole) {
                    Auth::logout();
                    return redirect()->route('login')->with('failed', 'Invalid role selected.');
                }

                $selectedRoleName = $selectedRole->name;
                $userRoles = $user->getRoleNames()->toArray();

                if (in_array($selectedRoleName, $userRoles)) {
                    switch ($selectedRoleName) {
                        case 'admin':
                            return redirect()->route('admin.dashboard');

                        case 'field':
                        case 'program':
                        case 'partner_or_ngo':
                        case 'csr_partner':
                            return redirect()->route('our-program.view-program');

                        case 'finance':
                            return redirect()->route('income.view-income');

                        case 'hr':
                            return redirect()->route('auth-human-resource.our-team.all-team-member');

                        default:
                            // Optional: fallback in case of unexpected role
                            Auth::logout();
                            return redirect()->route('login')->with('failed', 'Invalid role selected.');
                    }
                } else {
                    Auth::logout();
                    return redirect()->route('login')->with('failed', 'You are unauthorized person.');
                }
            }

            return redirect()->route('login')->with('failed', 'Invalid credentials.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Something went wrong. ' . $e->getMessage());
        }
    }
}
