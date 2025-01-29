<?php

namespace App\Repositories\auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserInterface;

class UserRepository implements UserInterface
{protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nik' => $data['nik'] ?? null,
            'no_hp' => $data['no_hp'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'user_created' => auth()->id(),
        ]);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }
}
