<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolYear;
use App\Services\SchoolService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct(
        protected SchoolService $schoolService
    ) {}

    public function index()
    {
        if (!Session::get('cas_is_admin', false)) {
            return redirect()->route('dashboard')->with('error', 'Δεν έχετε δικαιώματα διαχειριστή');
        }

        $years = SchoolYear::orderBy('sxoliko_etos', 'desc')->get();
        $currentYear = SchoolYear::getCurrent();

        return view('admin.index', compact('years', 'currentYear'));
    }

    public function switchYear(Request $request)
    {
        if (!Session::get('cas_is_admin', false)) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'year_id' => 'required|exists:schoolyears,id',
        ]);

        $year = SchoolYear::find($request->year_id);
        SchoolYear::setCurrent($year->sxoliko_etos);
        Session::put('current_school_year', $year);

        return redirect()->route('admin.index')
            ->with('success', 'Το σχολικό έτος άλλαξε σε ' . $year->sxoliko_etos);
    }

    public function schools()
    {
        if (!Session::get('cas_is_admin', false)) {
            return redirect()->route('dashboard');
        }

        $currentYear = SchoolYear::getCurrent();
        $schools = $this->schoolService->getSchoolsForYear($currentYear);

        return view('admin.schools', compact('schools', 'currentYear'));
    }
}
