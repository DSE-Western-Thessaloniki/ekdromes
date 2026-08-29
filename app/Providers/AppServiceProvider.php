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
        // Only share session values when the controller hasn't already passed them
        view()->composer('*', function ($view) {
            $data = $view->getData();

            $view->with('casUser', Session::get('cas_user'));
            $view->with('isAdmin', Session::get('cas_is_admin', false));

            if (! isset($data['currentSchool'])) {
                $view->with('currentSchool', Session::get('cas_school'));
            }
            if (! isset($data['currentYear'])) {
                $view->with('currentYear', Session::get('current_school_year'));
            }
        });
    }
}
