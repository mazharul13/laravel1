<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    // Show a simple password form
    public function showForm()
    {
        return view('password');
    }

    // Handle password submission
    public function submit(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'min:8',
                'regex:/[a-z]/', // at least one lowercase
                'regex:/[A-Z]/', // at least one uppercase
                'regex:/[0-9]/', // at least one digit
                'regex:/[@$!%*#?&]/', // at least one special char
            ],
            'retype_new_password' => 'required|same:new_password',
            'captcha' => 'required|in:5g7h2', // simple static captcha for demo
        ], [
            'new_password.regex' => 'Password must contain uppercase, lowercase, number, and special character.',
            'captcha.in' => 'Captcha is incorrect.',
        ]);

        // Here you would check the current password against the authenticated user
        // For demo, we skip actual password check

        return back()->with('status', 'Password changed successfully!');
    }
}
