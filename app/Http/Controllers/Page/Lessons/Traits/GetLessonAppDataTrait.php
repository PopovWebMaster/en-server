<?php 

namespace App\Http\Controllers\Page\Lessons\Traits;

use App\Http\Controllers\ValidateTraits\ValidateAppLessonDataTrait;
// use App\Http\Controllers\Traits\GetWordsByLessonIdTrait;

use App\Http\Controllers\Page\Admin\Traits\GetAppDataTrait;


use Cookie;


trait GetLessonAppDataTrait{

    use ValidateAppLessonDataTrait;
    // use GetWordsByLessonIdTrait;
    use GetAppDataTrait;

    public function GetLessonAppData( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateAppLesson = $this->ValidateAppLessonData( $request );
        if( $validateAppLesson[ 'ok' ] ){

            $keyName = $validateAppLesson[ 'value' ][ 'keyName' ];
            $lessonId = $validateAppLesson[ 'value' ][ 'lessonId' ];
            
            $result[ 'appData' ] = $this->GetAppData( $keyName );

            $result[ 'ok' ] = true;
            

        }else{
            $result[ 'routeToLessons' ] = route( 'lessons' );
            $result[ 'message' ] = $validateAppLesson[ 'message' ];
        };


        // $request->cookie( 'coockieTest', 'Проба кук', 100 );

        // Cookie::queue( Cookie::make( 'coockieTest', 'Проба кук', 100 ));

        // $result[ 'coockieTest' ] = $request->cookie( 'coockieTest' );



        return $result;
        
        
    }

}


?>


