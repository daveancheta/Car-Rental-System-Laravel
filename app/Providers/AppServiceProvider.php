<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

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



    public function boot()
    {
        Gate::define('access-admin', function ($user) {
            return $user->is_admin
                ? Response::allow()
                : Response::denyAsNotFound(); 
        });
    }
}
