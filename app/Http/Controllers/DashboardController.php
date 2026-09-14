<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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

        $school = Session::get('school');
        $apiUrl = route('api.school.excursion.search');

        return view('dashboard.index', [
            'currentYear' => $currentYear,
            'apiUrl' => $apiUrl,
            'schoolId' => $school->id,
        ]);
    }
}
