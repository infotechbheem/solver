<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }
        try {
            // Determine if the input is email or username
            $input = $request->only('username', 'password');
            $field = filter_var($input['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            // Attempt to authenticate the user
            if (Auth::attempt([$field => $input['username'], 'password' => $input['password']])) {
                $user = Auth::user();
                // Redirect based on the user role
                if ($user->hasRole('admin')) {
                    // Fetch the mail details for this ngo_id from the database
                    return redirect()->route('admin.dashboard');
                }
                // If the user does not have a recognized role, log them out
                Auth::logout();
                return redirect()->route('login')->with('failed', 'You do not have access to this area.');
            }

            // If the login fails, redirect back to the login page with an error message
            return redirect()->route('login')->with('failed', 'Invalid credentials.');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}
