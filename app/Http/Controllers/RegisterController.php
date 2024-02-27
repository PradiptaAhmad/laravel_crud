<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return redirect()->back()->with('failed', 'User with this email already exists.');
        }
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with('failed', 'Confirm Password does not match.');
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return redirect('/login')->with('success', 'Register Success! Please Login.');
        }
    }
}
