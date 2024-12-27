<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isOperator', function ($user) {
            return $user->role === 'operator';
        });

        Gate::define('isKesiswaan', function ($user) {
            return $user->role === 'kesiswaan';
        });

        Gate::define('isWaliKelas', function ($user) {
            return $user->role === 'waliKelas';
        });
    }
}
