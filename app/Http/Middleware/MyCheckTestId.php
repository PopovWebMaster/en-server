<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Route;

use App\Models\Tests;

use App\Http\Controllers\Traits\GetKeyNameFromLanguageAliasTrait;

class MyCheckTestId
{
    use GetKeyNameFromLanguageAliasTrait;

    public function handle(Request $request, Closure $next)
    {
        $isValid = false;

        $route = $request->route();

        if ( $route instanceof \Illuminate\Routing\Route ) {
            $parameters = $route->parameters();
            
            $testId = $parameters['testId'] ?? null;
            $languageAlias = $parameters['languageAlias'] ?? null;

            if( $languageAlias !== null ){
                $keyName = $this->GetKeyNameFromLanguageAlias( $languageAlias );
                if( $keyName !== null ){
                    $model = Tests::where( 'id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                    if( $model !== null ){
                        if( $model->is_active ){
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
    }
}
