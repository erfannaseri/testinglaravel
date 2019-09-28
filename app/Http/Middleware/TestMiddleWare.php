<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class TestMiddleWare
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
        if ($request->input('job')=='joined') {
            return redirect('/members');
        } elseif ($request->input('job') =='guest') {
            Session::flash('guest','شما عضو نیستید');
            return redirect('/login');
        }
        return $next($request);
    }
}
