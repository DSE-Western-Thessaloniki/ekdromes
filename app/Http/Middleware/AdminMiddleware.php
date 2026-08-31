<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cas_model_category = Session::get('cas_model_category', '');
        if (! $cas_model_category === 'user') {
            abort(403, 'Δεν έχετε δικαιώματα διαχειριστή');
        }

        return $next($request);
    }
}
