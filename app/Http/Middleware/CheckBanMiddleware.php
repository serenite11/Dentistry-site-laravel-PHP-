<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\AuthorizedController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && auth()->user()->status=='ban'){
            auth()->logout();
            return response()->view('auth.message',['message'=>'profile_blocked']);
        }
        return $next($request);
    }
}
