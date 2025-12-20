<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.Register.register');
    }

    public function store(RegisterRequest $request){

        $validasi = $request->validated();


        $validasi['password'] = bcrypt($validasi['password']);

        $proses = User::create([
            'nama' => $validasi['nama'],
            'email' => $validasi['email'],
            'password' => $validasi['password'],
            'updated_at' => null
        ]);

        if ($proses) {
            return redirect('/login')->with('toast_success', 'Registration successful !!');
        } else {
            return redirect()->back()->with('warning', 'Registration failed');
        }
    }


}
