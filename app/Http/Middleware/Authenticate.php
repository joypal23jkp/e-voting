<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, $guard = null)
    {
        //check here if the user is authenticated
        if ( $guard === null && ! $this->auth->user() )
        {
            return redirect('login');
        }

        //check here if the user is authenticated
        if ( $guard === 'admin' && !$this->auth->guard($guard)->user() )
        {

//           dd(Hash::make('11111111'));

            return redirect('admin/login');
        }
        return $next($request);

    }
}
