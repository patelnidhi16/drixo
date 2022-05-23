<?php

namespace App\Providers;

use App\Interfaces\AbcInterface;
use App\Repositories\AbcRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AbcInterface::class,AbcRepository::class);
    }
    public function boot()
    {
        //
    }
}
