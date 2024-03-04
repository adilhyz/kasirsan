<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        //
        $locale = env('APP_LOCALE', 'en'); // Default to English if not set in .env
        App::setLocale($locale);

        Paginator::useBootstrap();
        Gate::define('Admin', function(User $user){
            return $user->level === 'Admin';
        });
        Gate::define('Petugas', function(User $user){
            return $user->level === 'Petugas';
        });
    }
}
