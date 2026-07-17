<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;

use App\Http\Controllers\Page\Admin\Traits\MoveWordToLessonTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;


trait MoveFreeWordsToLessonTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use MoveWordToLessonTrait;
    use GetWordListTrait;

    public function MoveFreeWordsToLesson( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){

                $keyName =  $validateKeyName[ 'value' ];
                $lessonId = $validateLessonId[ 'value' ];

                $wordsIdList =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'wordsIdList' ] )?  $request[ 'data' ][ 'wordsIdList' ]:    []: [];

                for( $i = 0; $i < count( $wordsIdList ); $i++ ){
                    $wordId = $wordsIdList[ $i ];
                    $this->MoveWordToLesson([
                        'keyName' =>    $keyName,
                        'lessonId' =>   $lessonId,
                        'wordId' =>     $wordId,
                    ]);
                };

                $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
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


