<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EntrepriseRole
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        // Check if the user is authenticated
        if ($user->usertype == 2 ) {
            // 
            return $next($request);
        } else {
            // 
            abort(403, 'Unauthorized');
        }
    }
}
