<?php
namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function create(array $data);
    public function findByEmail(string $email);

}
