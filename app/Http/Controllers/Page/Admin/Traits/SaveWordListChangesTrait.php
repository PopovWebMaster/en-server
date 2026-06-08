<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordListTrait;

trait SaveWordListChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetWordListTrait;
    use ValidateWordListTrait;

    public function SaveWordListChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){

                $keyName =          $validateKeyName[ 'value' ];
                $lessonId =         $validateLessonId[ 'value' ];

                $validateWordList = $this->ValidateWordList( $request );
                if( $validateWordList[ 'ok' ] ){
                    $wordList = $validateWordList[ 'value' ];

                    if( $keyName === 'EN' ){

                        for( $i = 0; $i < count( $wordList ); $i++ ){

                            $id =               $wordList[ $i ][ 'id' ];
                            $foreign =          $wordList[ $i ][ 'foreign' ];
                            $ru =               $wordList[ $i ][ 'ru' ];
                            $transcription =    $wordList[ $i ][ 'transcription' ];
                            $audio =            $wordList[ $i ][ 'audio' ];

                            $wordEn = WordEn::where( 'lesson_en_id', '=', $lessonId )->where( 'id', '=', $id )->first();
                            if( $wordEn !== null ){
                                $wordEn->en = $foreign;
                                $wordEn->ru = $ru;
                                $wordEn->transcription = $transcription;
                                $wordEn->save();
                            };
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


