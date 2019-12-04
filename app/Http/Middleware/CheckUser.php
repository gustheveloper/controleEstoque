<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckUser
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
        $user = Auth::user();
        if($user){

        return $next($request);
    }else{
      return redirect('/login');
    }
}
}

/*Google API:
ID: 546818683607-cii31du2jcsdpnncb4l1dv6fug274g6n.apps.googleusercontent.com
Chave: 4HygifbDFRN5pCdqEDg5DXLl
