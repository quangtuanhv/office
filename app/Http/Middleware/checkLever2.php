<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkLever2
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
        if ((Auth::user()->profile->role_id==3)or(Auth::user()->profile->role_id==2)) {
            return  $next($request);
        }
        return redirect("khong-du-quyen");
    }
}
