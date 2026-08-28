<?php

namespace App\Guards;

use App\Models\School;
use App\Services\CasService;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class CasGuard implements Guard
{
    protected $request;
    protected UserProvider $provider;
    protected Application $app;
    protected ?School $user = null;
    protected bool $loggedOut = false;

    public function __construct(UserProvider $provider, Application $app)
    {
        $this->provider = $provider;
        $this->app = $app;
    }

    public function user()
    {
        if ($this->loggedOut) {
            return null;
        }

        if ($this->user !== null) {
            return $this->user;
        }

        $schoolId = session('cas_school_id');
        if ($schoolId) {
            $this->user = School::find($schoolId);
            return $this->user;
        }

        $casService = app(CasService::class);
        if ($casService->getUserEmail()) {
            $school = $casService->findSchoolByEmail($casService->getUserEmail());
            if ($school) {
                session(['cas_school_id' => $school->id]);
                $this->user = $school;
                return $this->user;
            }
        }

        return null;
    }

    public function id()
    {
        $user = $this->user();
        return $user ? $user->id : null;
    }

    public function guest()
    {
        return !$this->check();
    }

    public function check()
    {
        return $this->user() !== null;
    }

    public function setUser(\Illuminate\Contracts\Auth\Authenticatable $user)
    {
        $this->user = $user;
        return $this;
    }

    public function logout()
    {
        $this->loggedOut = true;
        $this->user = null;
        session()->forget('cas_school_id');
        session()->forget('cas_is_admin');
        session()->forget('cas_display_name');
    }
}
