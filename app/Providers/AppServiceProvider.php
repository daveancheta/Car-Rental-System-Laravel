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
        Paginator::useTailwind();
        
        Gate::define('access-admin', function ($user) {
            return $user->is_admin
                ? Response::allow()
                : Response::denyAsNotFound(); 
        });

         Gate::define('access-driver', function ($user) {
            return $user->is_driver
                ? Response::allow()
                : Response::denyAsNotFound(); 
        });
    }
}
