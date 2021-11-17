<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        // validation
        $this->validate($request, [
            'email' => 'required|email|max:225',
            'password' => 'required',
        ]);

        // log user in
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$auth) {
            return back()->with('status', 'Invalid Login Details');
        }

        // redirect
        return redirect()->route('dashboard');
    }
}
