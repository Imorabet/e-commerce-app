<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return view('Auth.login');
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
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('client.dashboard');
            }
        } else {
            return redirect()->route('login.n')
                ->withErrors(['email' => 'Invalid credentials'])
                ->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
