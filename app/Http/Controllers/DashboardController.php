<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = SchoolYear::getSessionCurrent();

        if (! $currentYear) {
            return redirect('/')->with('error', 'Δεν υπάρχει διαθέσιμο σχολικό έτος');
        }

        if (Session::get('cas_model_category') === 'user') {
            return to_route('admin.index');
        }
        // Find school by email
        $school = Session::get('school');

        $excursions = $school->excursions()
            ->where('school_year_id', $currentYear->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard.index', ['excursions' => $excursions, 'currentYear' => $currentYear]);
    }
}
