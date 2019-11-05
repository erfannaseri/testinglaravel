<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$email)
    {

        if ($request->user()->email == $email) {
            return $next($request);
        }
        return redirect('/');
    }
    public function terminate($req,$res)
    {
        file_put_contents(__DIR__.'/abc.txt','wegewgwefgewgfewfg');
    }
}
