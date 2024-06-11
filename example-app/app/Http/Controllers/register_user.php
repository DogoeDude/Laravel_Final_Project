<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisteredUsers;
use Illuminate\Support\Facades\Validator;

class register_user extends Controller
{
    public function registerUser(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:registeredusers',
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
}
