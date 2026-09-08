<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use App\Services\SchoolService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct(
        protected SchoolService $schoolService
    ) {}

    public function index()
    {
        $currentYear = SchoolYear::getSessionCurrent();

        if (! $currentYear) {
            return redirect()->route('dashboard')->with('error', 'Δεν υπάρχει διαθέσιμο σχολικό έτος');
        }

        $selectedSchoolId = Session::get('admin_selected_school');
        $selectedSchool = null;
        if ($selectedSchoolId) {
            $selectedSchool = School::find($selectedSchoolId);
        }

        $allExcursions = Excursion::where('school_year_id', $currentYear->id)
            ->when($selectedSchool, function ($query) use ($selectedSchool) {
                return $query->where('school_id', $selectedSchool->id);
            })
            ->with(['school', 'schoolYear'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.index', ['currentYear' => $currentYear, 'allExcursions' => $allExcursions]);
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

    public function sessionSwitchYear(Request $request): RedirectResponse
    {
        $request->validate([
            'year_id' => 'required|exists:schoolyears,id',
        ]);

        $year = SchoolYear::find($request->year_id);
        Session::put('current_school_year', $year);

        return redirect()->route('admin.index')
            ->with('success', 'Το σχολικό έτος άλλαξε προσωρινά σε '.$year->sxoliko_etos);
    }

    public function selectSchool(Request $request)
    {
        $schoolId = $request->input('school_id');
        $school = School::find($schoolId);

        if (! $school) {
            return redirect()->route('admin.index')
                ->withErrors(['school_code' => 'Το σχολείο δεν βρέθηκε']);
        }

        Session::put('admin_selected_school', $schoolId);

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
