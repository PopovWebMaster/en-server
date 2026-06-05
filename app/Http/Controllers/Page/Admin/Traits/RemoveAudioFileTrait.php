<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordEnIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateAudioFileNameTrait;
use App\Http\Controllers\Traits\GetAudioFilePuthTrait;

trait RemoveAudioFileTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetWordListTrait;
    use ValidateWordEnIdTrait;
    use ValidateAudioFileNameTrait;
    use GetAudioFilePuthTrait;

    public function RemoveAudioFile( $request ){
        /*
            wordList
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
                $validateAudioFileName = $this->ValidateAudioFileName( $request );
                if( $validateAudioFileName[ 'ok' ] ){
                    $foreignWordId = null;
                    $validateWordEnId = null;
                    $keyName =          $validateKeyName[ 'value' ];

                    if( $keyName === 'EN' ){
                        $validateWordEnId = $this->ValidateWordEnId( $request );
                    };

                    if( $validateWordEnId === null ){
                        $result[ 'message' ] = 'Не прописан метод для языка '.$keyName;
                    }else{
                        // $keyName =          $validateKeyName[ 'value' ];
                        $lessonId =         $validateLessonId[ 'value' ];
                        $audioFileName =    $validateAudioFileName[ 'value' ];
                        $foreignWordId =    $validateWordEnId[ 'value' ];


                        
                        $puth = $this->GetAudioFilePuth( $keyName, $lessonId );

                        if( Storage::disk( 'audio' )->exists( $puth.'/'.$audioFileName ) ){
                            Storage::disk( 'audio' )->delete( $puth.'/'.$audioFileName );
                        };

                        if( $keyName === 'EN' ){
                            $audioEn = AudioEn::where( 'word_en_id', '=', $foreignWordId )->where( 'file_name', '=', $audioFileName )->first();
                            if( $audioEn !== null ){
                                $audioEn->delete();
                            };
                        };

                        $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                        $result[ 'ok' ] = true;
                    };


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


