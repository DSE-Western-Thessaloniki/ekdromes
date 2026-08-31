<?php

namespace App\Http\Middleware;

use App\Models\School;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureCasAccountHasAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $school_model = null;
        $user_model = null;

        $user = User::where('email', cas()->getAttribute('mail'))
            ->first();

        if ($user) {
            $cas_model_category = 'user';

            $user_model = $user;
        } else {
            $school = School::where('kodikos_sxoleiou', cas()->getAttribute('uid'))
                ->orWhere('kodikos_sxoleiou', Str::replace('@sch.gr', '', cas()->getAttribute('mail')))
                ->orWhere('email', cas()->getAttribute('mail'))
                ->first();

            if (! $school) { // Αν ο λογαριασμός δεν αντιστοιχεί σε σχολική μονάδα
                Log::warning('Το uid:'.cas()->getAttribute('uid').' και το email:'.cas()->getAttribute('mail').' δεν αντιστοιχούν σε λογαριασμό.');

                return response()->view('pages.deny_access');
            }

            $cas_model_category = 'school';

            $school_model = $school;
        }

        session([
            'school' => $school_model,
            'user' => $user_model,
            'cas_model_category' => $cas_model_category,
        ]);

        return $next($request);
    }
}
