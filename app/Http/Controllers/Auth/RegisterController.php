<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|max:225',
            'username' => 'required|max:225',
            'email' => 'required|email|max:225',
            'password' => 'required|confirmed',
        ]);


        // store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // sign user in
        // to get the email and password
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        //dd(Auth::user()); //check if signed in the the attribute array

        // redirect user
        return redirect()->route('dashboard');
    }
}
