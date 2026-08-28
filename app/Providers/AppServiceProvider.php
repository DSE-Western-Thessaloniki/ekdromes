<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
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
        // Share CAS user data with all views
        view()->composer('*', function ($view) {
            $view->with('casUser', Session::get('cas_user'));
            $view->with('isAdmin', Session::get('cas_is_admin', false));
            $view->with('currentSchool', Session::get('cas_school'));
            $view->with('currentYear', Session::get('current_school_year'));
        });
    }
}
