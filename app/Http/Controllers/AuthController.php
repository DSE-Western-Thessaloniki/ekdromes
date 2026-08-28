<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Services\CasService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct(
        protected CasService $casService
    ) {}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $this->casService->authenticate();

            $email = $this->casService->getUserEmail();
            $userId = $this->casService->getUserId();

            if (!$email) {
                return redirect()->route('login')->with('error', 'Αποτυχία ταυτοποίησης');
            }

            $currentYear = SchoolYear::getCurrent();
            if (!$currentYear) {
                return redirect()->route('login')->with('error', 'Δεν υπάρχει διαθέσιμο σχολικό έτος');
            }

            $school = $this->casService->findSchoolByEmail($email);

            if ($school) {
                Session::put('cas_user', $userId);
                Session::put('cas_school', $school);
                Session::put('cas_school_id', $school->id);
                Session::put('cas_is_admin', false);
                Session::put('cas_display_name', $school->displayname);
                Session::put('current_school_year', $currentYear);
            } elseif ($this->casService->isAdmin()) {
                Session::put('cas_user', $userId);
                Session::put('cas_school', null);
                Session::put('cas_school_id', null);
                Session::put('cas_is_admin', true);
                Session::put('cas_display_name', 'Ειδική επιλογή: Προβολή όλων');
                Session::put('current_school_year', $currentYear);
            } else {
                return redirect()->route('login')->with('error', 'Το email δεν αντιστοιχεί σε εγγεγραμμένο σχολείο');
            }

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Αποτυχία σύνδεσης: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        $this->casService->logout();
        return redirect()->route('login');
    }
}
