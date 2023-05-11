<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'type' => 'client',
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('login.n')->withToastSuccess('Account created successfully!');
    }
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($validatedData)) {
            $user = Auth::user();

          if ($user->type === 'admin') {
                return redirect()->route('admin.dashboard')->with('user', $user)->withToastSuccess('Welcome back!');
            } else {
                return redirect()->route('welcome')->with('user', $user)->with('user', $user)->withToastSuccess('Welcome back Dear client!');
            }
        } else {
            return redirect()->route('login.n')->with('toast_error', 'Invalid credentials')->withInput();
    }}
    public function logout(Request $request)
    {
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
