<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\LessonPhrases;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonPhraseIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneLessonDataTrait;

trait RemoveOneLessonPhraseTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use ValidateLessonPhraseIdTrait;
    use GetOneLessonDataTrait;

    public function RemoveOneLessonPhrase( $request ){
        /*
            wordList
        */

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){
                $validateLessonPhraseId = $this->ValidateLessonPhraseId( $request );
                if( $validateLessonPhraseId[ 'ok' ] ){
                    $keyName =          $validateKeyName[ 'value' ];
                    $lessonId =         $validateLessonId[ 'value' ];
                    


                    $lessonPhraseId = $validateLessonPhraseId[ 'value' ];

                    $lessonPhrasesModel = LessonPhrases::where( 'key_name', '=', $keyName )
                                                       ->where( 'id', '=', $lessonPhraseId )
                                                       ->where( 'lesson_id', '=', $lessonId )
                                                       ->first();

                    if( $lessonPhrasesModel !== null ){
                        $lessonPhrasesModel->delete();
                    };

                    $result[ 'oneLessonData' ] = $this->GetOneLessonData( $keyName, $lessonId );

                    $result[ 'ok' ] = true;

                }else{
                    $result[ 'message' ] = $validateAudioFileName[ 'message' ];
                };

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


