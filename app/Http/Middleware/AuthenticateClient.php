<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Session;

class AuthenticateClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'client')
    {
        if (Auth::guard('client')->guest()) {
            if($request->ajax()){
              $codigo = str_random(60);
              Session::put("codigo",$codigo);
              return response()->json(array(
                  "errors"=>true,
                  "message"=>"noautorizado",
                  "ua"=>Crypt::encrypt(url()->full()."&codigo=".$codigo)
                ));
            }
            return redirect('/');
        }

        return $next($request);
    }
}
