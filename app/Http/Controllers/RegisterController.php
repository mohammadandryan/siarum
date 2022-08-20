<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', ['title' => 'Register']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        $user = User::create($validatedData);
        event(new Registered($user));
        // $request->user()->sendEmailVerificationNotification();
        // session()->flash('success', 'Berhasil Mendaftar');
        return redirect()->route('login.index')->with('success','Berhasil Mendaftar, Silahkan Login');
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

    }
}
