<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Login'
        ]);
    }

    public function loginAuthenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);
        // dd('berhasil login');
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('messageFailed', 'Login failed!');
    }

    public function logoutAuthenticate()
    {
        Auth::logout();

        request()->session()->invalidate();
        
        request()->session()->regenerateToken();

        return redirect('/');
    }
    
    // public function register()
    // {
    //     return view('auth.register', [
    //         'siteName' => 'Digidaxa 3D Management',
    //         'title' => 'Register'
    //     ]);
    // }

    // public function registerStore(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => ['required', 'max:255'],
    //         'username' => ['required', 'min:5', 'max:255', 'unique:users'],
    //         'email' => ['required', 'email:dns', 'unique:users'],
    //         'password' => ['required', 'confirmed', 'min:8', 'max:255'],
    //     ]);

    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     User::create($validatedData);

    //     // $request->session()->flash('message', 'Registration succesfull! Please login');

    //     return redirect('/login')->with('messageSuccess', 'Registration succesfull! Please login');
    // }
}
