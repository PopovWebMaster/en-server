<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Tests;

use App\Http\Controllers\ValidateTraits\ValidateLanguageAliasTrait;

use Route;

class MyCheckLanguageAlias
{
    use ValidateLanguageAliasTrait;

    public function handle(Request $request, Closure $next)
    {

        $isValid = false;

        $route = $request->route();

        $permitted_routes = [
            'language_test',
            'one_test',
            'language_lessons',
            'one_lessons',

        ];

        if ( $route instanceof \Illuminate\Routing\Route ) {
            $parameters = $route->parameters();
            
            $languageAlias = $parameters['languageAlias'] ?? null;

            if( $languageAlias !== null ){
                $validate = $this->ValidateLanguageAlias( $languageAlias );
                if( $validate[ 'ok' ] ){
                    if( $validate[ 'keyName' ] !== null ){
                        $routeName = Route::currentRouteName();
                        if( in_array( $routeName, $permitted_routes ) ){
                            $isValid = true;
                        };
                    };
                };
            };
        };

        if( $isValid ){
            return $next($request);
        }else{
            return redirect()->route( 'home' );
        };

        // return $next($request);
    }
}
