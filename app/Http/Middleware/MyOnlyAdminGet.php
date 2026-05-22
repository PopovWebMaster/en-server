<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;

class MyOnlyAdminGet
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

        if( Auth::check() ){
            $user = Auth::user();
            $user_email = $user->email;

            if( config('app.admin_email') === $user_email ){
                return $next($request);
            }else{
                return redirect()->route('home');
            };
        }else{
            return redirect()->route('home');
        };


        
    }
}
