<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $cas = app('cas');
        $userEmail = $cas->user();
        $currentYear = SchoolYear::getCurrent();

        if (! $currentYear) {
            return redirect('/')->with('error', 'Δεν υπάρχει διαθέσιμο σχολικό έτος');
        }

        // Store current year in session
        Session::put('current_school_year', $currentYear);

        // Check if user is admin
        $adminEmails = config('cas.admin_emails', []);
        $isAdmin = in_array($userEmail, $adminEmails);

        if ($isAdmin) {
            Session::put('cas_is_admin', true);
            Session::put('cas_school');

            $excursions = Excursion::where('school_year_id', $currentYear->id)
                ->with('school')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            Session::put('cas_is_admin', false);

            // Find school by email
            $school = School::where('school_year_id', $currentYear->id)
                ->where('email', $userEmail)
                ->first();

            if (! $school) {
                return redirect('/')->with('error', 'Το email δεν αντιστοιχεί σε εγγεγραμμένο σχολείο');
            }

            Session::put('cas_school', $school);
            Session::put('cas_school_id', $school->id);

            $excursions = $school->excursions()
                ->where('school_year_id', $currentYear->id)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('dashboard.index', ['excursions' => $excursions, 'currentYear' => $currentYear, 'isAdmin' => $isAdmin]);
    }
}
