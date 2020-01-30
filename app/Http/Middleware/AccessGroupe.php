<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessGroupe
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

        if (!empty(Auth::user()->groupe()->find($groupe)) || (!empty(\App\Groupe::find($groupe)) && \App\Groupe::find($groupe)->etat == 'public')) {
            return $next($request);
        }

        return redirect('/home');
    }
}
