<?php

namespace App\Repositories\auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create([
            'nama' => $data['nama'],
            'nik' => $data['nik'] ?? null,
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
            'user_created' => auth()->id(),
        ]);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function verifyEmail(int $userId)
    {
        return $this->model->find($userId)->markEmailAsVerified();
    }

    public function markEmailAsVerified($user)
    {
        return $user->markEmailAsVerified();
    }
}
