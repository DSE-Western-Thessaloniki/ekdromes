<?php

namespace App\Providers;

use App\Services\CasService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CasService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::extend('cas', function ($app, $name, array $config) {
            $provider = Auth::createUserProvider($config['provider'] ?? 'cas');
            return new \App\Guards\CasGuard($provider, $app);
        });

        // Share CAS user data with all views
        view()->composer('*', function ($view) {
            $view->with('casUser', Session::get('cas_user'));
            $view->with('isAdmin', Session::get('cas_is_admin', false));
            $view->with('currentSchool', Session::get('cas_school'));
            $view->with('currentYear', Session::get('current_school_year'));
        });
    }
}
