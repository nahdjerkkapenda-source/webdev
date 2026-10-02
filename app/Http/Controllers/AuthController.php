<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        if ($request->password !== $request->confirm_password) {
            return back()->with('error', 'Passwords do not match.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function login(Request $request) {
        $user = User::where([
            'email' => $request->email,
            //'password' => $request->password
        ])->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials.');
    }
}
