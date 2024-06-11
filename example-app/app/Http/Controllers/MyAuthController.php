<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RegisteredUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAuthController extends Controller
{
    public function registerUser(Request $request)
    {
         // Validate the incoming request data
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:registeredusers,email',
        'password' => 'required|min:8',
    ]);

    // Create a new user record in the database
    $user = RegisteredUsers::create([
        'firstname' => $validatedData['firstname'],
        'lastname' => $validatedData['lastname'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
    ]);

    // Optionally, you can return a response indicating success
    return view('LRpage');
    }

    public function checkCredentials(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        // Find the user by email
        $user = RegisteredUsers::where('email', $email)->first();
        // Check if user exists and if the password matches
        if ($user && Hash::check($password, $user->password)) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('LRpage');
    }

    public function loggingout(){
        return view('LRpage');
    }
    public function profile(){
        return 'Profile page.';
    }
}