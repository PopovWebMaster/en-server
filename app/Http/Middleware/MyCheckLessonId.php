<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Route;

use App\Http\Controllers\Traits\GetKeyNameFromLanguageAliasTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;

class MyCheckLessonId
{
    use GetKeyNameFromLanguageAliasTrait;
    use GetLessonModelByIdTrait;

    public function handle(Request $request, Closure $next)
    {
        $isValid = false;

        $route = $request->route();

        if ( $route instanceof \Illuminate\Routing\Route ) {
            $parameters = $route->parameters();
            $lessonId = $parameters['lessonId'] ?? null;
            $languageAlias = $parameters['languageAlias'] ?? null;

            if( $languageAlias !== null ){
                $keyName = $this->GetKeyNameFromLanguageAlias( $languageAlias );
                if( $keyName !== null ){
                    $model = $this->GetLessonModelById( $keyName, $lessonId );
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
