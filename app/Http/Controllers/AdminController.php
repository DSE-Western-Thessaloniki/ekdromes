<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
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
        $currentYear = SchoolYear::getCurrent();
        if (! $currentYear) {
            $currentYear = SchoolYear::orderBy('sxoliko_etos', 'desc')->first();
        }

        if (! $currentYear) {
            return redirect()->route('dashboard')->with('error', 'Δεν υπάρχει διαθέσιμο σχολικό έτος');
        }

        $allExcursions = Excursion::where('school_year_id', $currentYear->id)
            ->with(['school', 'schoolYear'])
            ->orderBy('kodikos_sxoleiou')
            ->orderBy('id', 'desc')
            ->get();

        $selectedSchoolCode = Session::get('admin_selected_school');
        $selectedSchool = null;
        if ($selectedSchoolCode) {
            $selectedSchool = School::where('kodikos_sxoleiou', $selectedSchoolCode)->first();
        }

        return view('admin.index', ['currentYear' => $currentYear, 'allExcursions' => $allExcursions, 'selectedSchool' => $selectedSchool]);
    }

    public function switchYear(Request $request)
    {
        $request->validate([
            'year_id' => 'required|exists:schoolyears,id',
        ]);

        $year = SchoolYear::find($request->year_id);
        SchoolYear::setCurrent($year->sxoliko_etos);
        Session::put('current_school_year', $year);

        return redirect()->route('admin.index')
            ->with('success', 'Το σχολικό έτος άλλαξε σε '.$year->sxoliko_etos);
    }

    public function selectSchool(Request $request)
    {
        $schoolCode = $request->input('school_code');
        $school = School::where('kodikos_sxoleiou', $schoolCode)->first();

        if (! $school) {
            return redirect()->route('admin.index')
                ->withErrors(['school_code' => 'Το σχολείο δεν βρέθηκε']);
        }

        Session::put('admin_selected_school', $schoolCode);

        return redirect()->route('admin.index')
            ->with('success', 'Επιλέχθηκε το σχολείο: '.$school->displayname);
    }

    public function clearSchoolSelection()
    {
        Session::forget('admin_selected_school');

        return redirect()->route('admin.index')
            ->with('success', 'Η επιλογή σχολείου ακυρώθηκε');
    }

    public function excursionsBySchool($schoolCode)
    {
        $school = School::where('kodikos_sxoleiou', $schoolCode)->first();
        if (! $school) {
            return redirect()->route('admin.index')
                ->with('error', 'Το σχολείο δεν βρέθηκε');
        }

        $currentYear = $school->schoolYear;
        if (! $currentYear) {
            $currentYear = SchoolYear::getCurrent();
        }
        if (! $currentYear) {
            $currentYear = SchoolYear::orderBy('sxoliko_etos', 'desc')->first();
        }

        $excursions = Excursion::where('school_id', $school->id)
            ->where('school_year_id', $currentYear->id)
            ->with(['school', 'schoolYear'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.excursions-by-school', ['school' => $school, 'excursions' => $excursions, 'currentYear' => $currentYear]);
    }

    public function schools()
    {
        $currentYear = SchoolYear::getCurrent();
        $schools = $this->schoolService->getSchoolsForYear($currentYear);

        return view('admin.schools', ['schools' => $schools, 'currentYear' => $currentYear]);
    }
}
