<?php 

namespace App\Http\Controllers\Page\Lessons\Traits;

use App\Http\Controllers\ValidateTraits\ValidateAppLessonDataTrait;
use App\Http\Controllers\Traits\GetWordsByLessonIdTrait;


trait GetLessonAppWordsListTrait{

    use ValidateAppLessonDataTrait;
    use GetWordsByLessonIdTrait;

    public function GetLessonAppWordsList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateAppLesson = $this->ValidateAppLessonData( $request );
        if( $validateAppLesson[ 'ok' ] ){

            $keyName = $validateAppLesson[ 'value' ][ 'keyName' ];
            $lessonId = $validateAppLesson[ 'value' ][ 'lessonId' ];
            
            $result[ 'app_words' ] = $this->GetWordsByLessonId( $keyName, $lessonId );

            $result[ 'ok' ] = true;
            

        }else{
            $result[ 'routeToLessons' ] = route( 'lessons' );
            $result[ 'message' ] = $validateAppLesson[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


