<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class IsModerator
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
        
        if(Auth::user())
            if (Auth::user()->role == User::ADMIN or Auth::user()->role == User::MODERATOR) {

                return $next($request);
            }
        abort(403, 'Unauthorized action.');
        
    }
}
