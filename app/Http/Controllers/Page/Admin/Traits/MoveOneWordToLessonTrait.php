<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\MoveWordToLessonTrait;


trait MoveOneWordToLessonTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetWordListTrait;
    use MoveWordToLessonTrait;

    public function MoveOneWordToLesson( $request ){

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

                $wordId = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'wordId' ] )? $request[ 'data' ][ 'wordId' ]: null: null;
                $nextLessonId = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'nextLessonId' ] )? $request[ 'data' ][ 'nextLessonId' ]: null: null;

                $this->MoveWordToLesson([
                    'keyName' => $keyName,
                    'lessonId' => $nextLessonId,
                    'wordId' => $wordId,
                ]);

                $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                $result[ 'ok' ] = true;
                    

            }else{
                $result[ 'message' ] = $validateLessonId[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

       
        

        return $result;
        
        
    }

}


?>


