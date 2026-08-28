<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Services\CasService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct(
        protected CasService $casService
    ) {}

    public function index()
    {
        $user = Session::get('cas_user');
        $isAdmin = Session::get('cas_is_admin', false);
        $currentYear = SchoolYear::getCurrent();

        if (!$currentYear) {
            return redirect()->route('login')->with('error', 'Δεν υπάρχει διαθέσιμο σχολικό έτος');
        }

        if ($isAdmin) {
            $excursions = \App\Models\Excursion::where('school_year_id', $currentYear->id)
                ->with('school')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $school = Session::get('cas_school');
            if (!$school) {
                return redirect()->route('login')->with('error', 'Δεν βρέθηκε σχολείο');
            }
            $excursions = $school->excursions()
                ->where('school_year_id', $currentYear->id)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('dashboard.index', compact('excursions', 'currentYear', 'isAdmin'));
    }
}
