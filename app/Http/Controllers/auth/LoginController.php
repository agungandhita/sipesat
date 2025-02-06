<?php

namespace App\Http\Controllers\auth;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.Login.login', [
            'tittle' => 'login'
        ]);
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();
                $user = auth()->user();

                if ($user->role == 'admin') {
                    return redirect()->intended('/admin')->with('toast_success', 'Login sebagai Admin berhasil');
                } elseif ($user->role == 'user') {
                    Alert::success('Berhasil', 'Login sebagai Manajer berhasil');
                    return redirect()->intended('/user');
                }

                Alert::success('Berhasil', 'Login berhasil');
                return redirect()->intended('/home');
            }

            return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');

        } catch (Exception $e) {
            Alert::error('Terjadi Kesalahan', $e->getMessage());
            return back();
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
