<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerStore(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard')
                ->with('success', 'Welcome Admin!');
        }

        return redirect('/student/dashboard')
            ->with('success', 'Welcome Student!');
    }

    public function loginStore(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')
                ->with('success', 'Welcome Admin!');
        }

        return redirect()->route('student.dashboard')
            ->with('success', 'Welcome Student!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('student.profile.index', compact('user'));
    }

    public function EditProfile()
    {
        $user = Auth::user();
        return view('student.profile.edit', compact('user'));
    }
}
