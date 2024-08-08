<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ValidatesRequests;

    public function loginIndex()
    {
        return view('login.login');
    }

    public function registerIndex()
    {
        return view('login.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect to the home page after successful login
            return redirect()->route('home')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8', // Ensure password confirmation is required
        ]);

        // Create the user and hash the password
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('homescreen.index')->with('success', 'Registration successful.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        toastr()->success('Logout successful!');
        return redirect()->route('login');
    }
}
