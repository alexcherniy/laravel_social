<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 12.10.16
 * Time: 15:53
 */

namespace App\Http\Middleware;


use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
        public function handle($request, \Closure $next, $guard = null)
        {
            if (Factory::guard($guard)->quest()){
                if($request->ajax()){
                    return response('Unauthorized, ', 401 );
                }else{
                    return redirect()->route('home');
                }
            }
            return $next($request);

        }
}