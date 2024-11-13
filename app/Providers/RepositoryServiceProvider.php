<?php

namespace App\Providers;

use App\Repositories\LoanRepository;
use App\Repositories\LoanRepositoryInterface;
use App\Repositories\EmiRepository;
use App\Repositories\EmiRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoanRepositoryInterface::class,LoanRepository::class);
        $this->app->bind(EmiRepositoryInterface::class,EmiRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
