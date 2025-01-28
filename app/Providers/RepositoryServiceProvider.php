<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\auth\UserRepository;
use App\Repositories\Interfaces\UserInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserInterface::class,UserRepository::class);
    }
}
