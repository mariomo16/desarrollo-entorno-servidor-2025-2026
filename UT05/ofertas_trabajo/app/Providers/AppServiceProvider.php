<?php

namespace App\Providers;

use App\Models\Oferta;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('manage-oferta', function (User $user, Oferta $oferta) {
            return $oferta->empresa->user->id == $user->id;
        });
    }
}
