<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class ProfileController extends Controller
{
 

public function deletePicture(Request $request)
{
    $user = Auth::user();
    $user->profile_picture = 'images/default.jpg'; 
    /** @var \App\Models\User $user **/
    $user->save();

    return redirect()->route('profile')->with('success', 'Profile picture deleted successfully.');
}

    public function show()
    {
        $orders = Order::where('user_id', auth::id())->with('orderItems')->get();
        return view('profile.profile', compact('orders')); 
    }
    public function update(Request $request)
    {
        
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'ends_with:.com', // Custom validation rule to ensure .com domain
                Rule::unique('users', 'email')->ignore(Auth::id()), // Ensure uniqueness except for the current user
            ],
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();
        /** @var \App\Models\User $user **/
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        $user->save();
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
