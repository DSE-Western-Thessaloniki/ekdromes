<?php

namespace App\Providers;

use App\Models\School;
use App\Models\SchoolYear;
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
        view()->composer('*', function ($view): void {
            $data = $view->getData();

            // Χρησιμοποιείται μόνο για την εμφάνιση του ονόματος του σχολείου
            // στο πάνω μέρος της σελίδας όταν συνδέεται σχολική μονάδα
            if (! isset($data['currentSchool'])) {
                $view->with('currentSchool', Session::get('school'));
            }
            if (! isset($data['currentYear'])) {
                $view->with('currentYear', Session::get('current_school_year'));
            }
            if (Session::get('cas_model_category') === 'user') {
                $view->with('isAdmin', true);

                if (! isset($data['schools'])) {
                    $view->with('schools', SchoolYear::getSessionCurrent()?->schools()->orderBy('displayname')->get() ?? collect());
                }
                if (! isset($data['schoolYears'])) {
                    $view->with('schoolYears', SchoolYear::orderBy('sxoliko_etos')->get());
                }
                // Χρησιμοποιείται μόνο κατά την εμφάνιση της λίστας των εκδρομών
                // στο admin περιβάλλον, όταν έχει επιλεγεί σχολείο
                if (! isset($data['selectedSchool'])) {
                    $view->with('selectedSchool', School::find(Session::get('admin_selected_school')));
                }
            } else {
                $view->with('isAdmin', false);
            }
        });
    }
}
