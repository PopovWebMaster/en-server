<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;

class MyOnlyAdminPost
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

        $result = [
            'ok' => false,
            'message' => 'У вас нет прав доступа. Вы - тварь, которая лезет куда не надо.',
        ];

        if( Auth::check() ){
            $user = Auth::user();
            $user_email = $user->email;
            if( config('app.admin_email') === $user_email ){
                $result[ 'ok' ] = true;
                $result[ 'messageok' ] = '';
            };
        };

        if( $result[ 'ok' ] === true ){
            return $next($request);
        }else{
            return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );
        };

        return $next($request);
    }
}
