<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('teacher.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Try to log in as teacher
        if (Auth::guard('teacher')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('teacher.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    // Show dashboard
    public function dashboard()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('teacher.dashboard', compact('teacher'));
    }

    // Logout
    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/teacher/login');
    }
}