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
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:registered_users',
            'password' => 'required|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, proceed with creating the user
        $incomingFields = $validator->validated();
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $newUser = RegisteredUsers::create($incomingFields);

        return redirect('/');
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