<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Interfaces\UserInterface;

class RegisterController extends Controller
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showRegistrationForm()
    {
        return view('auth.Register.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userRepository->create($request->validated());

        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}
