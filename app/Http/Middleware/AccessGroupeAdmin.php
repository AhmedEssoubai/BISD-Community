<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessGroupeAdmin
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
        $groupe = $request->route('groupe');
        // dd();
        if(  !empty(Auth::user()->groupe()->find($groupe))  && Auth::user()->groupe()->find($groupe)->pivot->type == 'admin' ) {
            return $next($request);
        }

        return redirect('/home');
        
    }
}
