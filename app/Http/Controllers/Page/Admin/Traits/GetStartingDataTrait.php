<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneLessonDataTrait;
use App\Http\Controllers\Page\Admin\Traits\GetMainPageDataTrait;




trait GetStartingDataTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetWordListTrait;
    use GetLessonsListTrait;
    use GetOneLessonDataTrait;
    use GetMainPageDataTrait;

    public function GetStartingData( $request, $user ){
        /*
            wordList
            lessonList
            oneLessonData
            mainPage
        */

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $what_to_take = isset( $request[ 'data' ][ 'what_to_take' ] )? $request[ 'data' ][ 'what_to_take' ]: [];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );

        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){

                $keyName = $validateKeyName[ 'value' ];
                $lessonId = $validateLessonId[ 'value' ];

                for( $i = 0; $i < count( $what_to_take ); $i++ ){

                    $item = $what_to_take[ $i ];

                    switch( $item ){
                        case 'wordList':
                            $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                            break;

                        case 'lessonList':
                            $result[ 'lessonList' ] = $this->GetLessonsList( $keyName );
                            break;

                        case 'oneLessonData':
                            $result[ 'oneLessonData' ] = $this->GetOneLessonData( $keyName, $lessonId );
                            break;
                        case 'mainPage':
                            $result[ 'mainPage' ] = $this->GetMainPageData( $keyName );
                            break;

                            
                    };

                };


                $result[ 'ok' ] = true;
            }else{
                $result[ 'message' ] = $validateLessonId[ 'message' ];
            };
            
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


