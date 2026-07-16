<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

// use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneLessonDataTrait;


use App\Models\LessonPhrases;

trait AddNewLessonPhraseTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetOneLessonDataTrait;

    public function AddNewLessonPhrase( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){

                $keyName = $validateKeyName[ 'value' ];
                $lessonId = $validateLessonId[ 'value' ];

                $foreign =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'foreign' ] )?  $request[ 'data' ][ 'foreign' ]:    null: null;
                $ru =       isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'ru' ] )?       $request[ 'data' ][ 'ru' ]:         null: null;

                // if( $keyName === 'EN' ){

                    $lessonPhrases = new LessonPhrases;

                    $lessonPhrases->foreign =   $foreign;
                    $lessonPhrases->ru =        $ru;
                    $lessonPhrases->key_name =  $keyName;
                    $lessonPhrases->lesson_id = $lessonId;

                    $lessonPhrases->save();

                    $result[ 'oneLessonData' ] = $this->GetOneLessonData( $keyName, $lessonId );

                    $result[ 'ok' ] = true;

                // }else{
                //     $result[ 'message' ] = 'Язык не прописан - '.$keyName;
                // };
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


