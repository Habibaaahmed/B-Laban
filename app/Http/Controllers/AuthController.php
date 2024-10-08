<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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

        return redirect()->route('home')->with('success', 'Registration successful.');
    }
    public function updateProfilePicture(Request $request)
{
    $request->validate([
        'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();

    // Store the image
    $imageName = time() . '.' . $request->profile_picture->extension();
    $request->profile_picture->move(public_path('images/profiles'), $imageName);
    
    /** @var \App\Models\User $user **/
    // Update user's profile picture path
    $user->profile_picture = 'images/profiles/' . $imageName;
    $user->save();

    return redirect()->route('profile')->with('success', 'Profile picture updated successfully.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        toastr()->success('Logout successful!');
        return redirect()->route('login');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail(),
            ], [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => Hash::make(Str::random(16)),
            ]);

            Auth::login($user);

            Log::info('Google login successful, user ID: ' . $user->id);

            return redirect()->route('home');

        } catch (ConnectException $e) {
            Log::error('Connection error during Google login: ' . $e->getMessage());
            return redirect('/')->with('status', 'There was a problem with Google login.')->with('statusType', 'error');
        } catch (\Exception $e) {
            Log::error('Error during Google login: ' . $e->getMessage());
            return redirect('/')->with('status', 'There was a problem with Google login.')->with('statusType', 'error');
        }
    }

}
