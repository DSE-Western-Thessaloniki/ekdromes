<?php

namespace App\Services;

use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Session;

class CasService
{
    private bool $initialized = false;

    public function initialize(): void
    {
        if ($this->initialized) {
            return;
        }

        if (class_exists('\phpCAS')) {
            \phpCAS::setDebug();
            \phpCAS::setCasServerHost(
                config('cas.host'),
                config('cas.port'),
                config('cas.scheme', 'https')
            );
            \phpCAS::setCasServerPath(config('cas.path', '/cas'));
            \phpCAS::setNoCasServerValidation();
            \phpCAS::setLang('el');
            \phpCAS::setContentType('text/html; charset=utf-8');
            \phpCAS::initializeSession();
        }

        $this->initialized = true;
    }

    public function authenticate(): void
    {
        $this->initialize();
        \phpCAS::forceAuthentication();
    }

    public function logout(): void
    {
        if ($this->initialized) {
            \phpCAS::logout();
        }
        Session::flush();
    }

    public function getUserEmail(): ?string
    {
        $this->initialize();
        return \phpCAS::getAttribute('mail') ?? \phpCAS::getUser() . '@sch.gr';
    }

    public function getUserId(): ?string
    {
        $this->initialize();
        return \phpCAS::getAttribute('uid') ?? \phpCAS::getUser();
    }

    public function isAdmin(): bool
    {
        $email = $this->getUserEmail();
        $adminList = config('cas.admin_emails', []);
        return in_array($email, $adminList);
    }

    public function findSchoolByEmail(string $email): ?School
    {
        $currentYear = SchoolYear::getCurrent();
        if (!$currentYear) {
            return null;
        }

        return School::where('school_year_id', $currentYear->id)
            ->where('email', $email)
            ->first();
    }

    public function getAuthenticatedUser(): ?array
    {
        $email = $this->getUserEmail();
        if (!$email) {
            return null;
        }

        $school = $this->findSchoolByEmail($email);

        if ($school) {
            return [
                'is_admin' => false,
                'school' => $school,
                'display_name' => $school->displayname,
                'email' => $email,
            ];
        }

        if ($this->isAdmin()) {
            return [
                'is_admin' => true,
                'school' => null,
                'display_name' => 'Ειδική επιλογή: Προβολή όλων',
                'email' => $email,
            ];
        }

        return null;
    }
}
