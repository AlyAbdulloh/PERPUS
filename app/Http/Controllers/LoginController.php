<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $role = "user";
        $getData = User::where('username', $request->get('username'))->first();
        if ($getData != null) {
            $role = $getData->role;
        }

        if (Auth::attempt($credentials)) {
            if ($role == 'administrator') {
                $request->session()->regenerate();

                return redirect()->intended('/dashboard');
            }
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with('failed', 'Check your data!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
