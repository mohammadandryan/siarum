<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 public function index()
 {
     return view('login.index', ['title' => 'Login']);
 }

 public function authenticate(Request $request)
 {
    $credentials = $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required']);

    if(Auth::attempt($credentials)){
    $request->session()->regenerate();
    return redirect()->intended(route('dashboard.index'));
    }
    session()->flash('LoginError', 'Email atau Password Salah');
    return back();

 }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('page.home');
    }
}
