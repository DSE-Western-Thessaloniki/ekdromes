<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('cas_is_admin', false)) {
            abort(403, 'Δεν έχετε δικαιώματα διαχειριστή');
        }

        return $next($request);
    }
}
