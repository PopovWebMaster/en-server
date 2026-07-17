<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordCollectionByLessonIdTrait;

trait SaveWordListChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetWordListTrait;
    use ValidateWordListTrait;
    use GetWordCollectionByLessonIdTrait;

    public function SaveWordListChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){
                $validateWordList = $this->ValidateWordList( $request );
                if( $validateWordList[ 'ok' ] ){

                    $keyName =      $validateKeyName[ 'value' ];
                    $lessonId =     $validateLessonId[ 'value' ];
                    $wordList =     $validateWordList[ 'value' ];

                    for( $i = 0; $i < count( $wordList ); $i++ ){

                        $id =               $wordList[ $i ][ 'id' ];
                        $foreign =          $wordList[ $i ][ 'foreign' ];
                        $ru =               $wordList[ $i ][ 'ru' ];
                        $transcription =    $wordList[ $i ][ 'transcription' ];
                        $audio =            $wordList[ $i ][ 'audio' ];

                        $wordCollection = $this->GetWordCollectionByLessonId( $keyName, $lessonId );
                        $wordModel = $wordCollection->where( 'id', '=', $id )->first();
                        if( $wordModel !== null ){
                            $keyName_low = strtolower($keyName);
                            $wordModel->$keyName_low = $foreign;
                            $wordModel->ru = $ru;
                            $wordModel->transcription = $transcription;
                            $wordModel->save();
                        };


                    };


                    $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                    $result[ 'ok' ] = true;

                }else{
                    $result[ 'message' ] = $validateWordList[ 'message' ];

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


