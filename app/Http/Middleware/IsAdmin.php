<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
            
        if (Auth::user() &&  Auth::user()->role == User::ADMIN) {

            return $next($request);
        }
        
        abort(403, 'Unauthorized action.');
        
    }
}
