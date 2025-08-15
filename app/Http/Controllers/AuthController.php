<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function  registerForm(){
        return view('pages.auth.register');
    }

    public function loginForm(){
        return view('pages.auth.login');
    }

    public function registerUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:writer,reader'
        ]);


        $user = User::create($validatedData);

        $user->assignRole($validatedData['role']);

        Auth::login($user);

        return redirect()->to('/');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
