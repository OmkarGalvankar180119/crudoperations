<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Admin
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
        if(Session::get('user_id') != '' && Session::get('name') != '' && Session::get('email') != '') {
            return $next($request);
        }

        return redirect('/');
    }
}
