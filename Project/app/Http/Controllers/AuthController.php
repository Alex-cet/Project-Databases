<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Traits\ToStringFormat;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function processRegistration(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phoneNumber' => 'required|string|max:15|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phoneNumber,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        session()->flash('success', 'Successfully registered!');

        return redirect('/');
    }

    public function loginRedirect(Request $request) {
        $username = $request->input('usernameLogIn');
        $password = $request->input('passwordLogIn');

        $user = DB::table('users')
        ->where('username', $username)
        ->first(); 

        if ($user && $password === $user->password) {
            // Authentication successful, store the username in the session
            session(['username' => $username]);
            return redirect('/mainPage');
        } else {
            // Authentication failed, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function signOut() {
        session()->forget('username');
        return redirect('/')->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => 'Sat, 01 Jan 2025 00:00:00 GMT',
        ]);
    }
}
