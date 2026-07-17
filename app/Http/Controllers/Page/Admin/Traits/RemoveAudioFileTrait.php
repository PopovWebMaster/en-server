<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateAudioFileNameTrait;
use App\Http\Controllers\Traits\GetAudioFilePuthTrait;
use App\Http\Controllers\Page\Admin\Traits\GetAudioCollectionByWordIdTrait;

trait RemoveAudioFileTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetWordListTrait;
    use ValidateWordIdTrait;
    use ValidateAudioFileNameTrait;
    use GetAudioFilePuthTrait;
    use GetAudioCollectionByWordIdTrait;

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
                    $validateWordId = $this->ValidateWordId( $request );
                    if( $validateWordId[ 'ok' ] ){

                        $keyName =          $validateKeyName[ 'value' ];
                        $lessonId =         $validateLessonId[ 'value' ];
                        $audioFileName =    $validateAudioFileName[ 'value' ];
                        $foreignWordId =    $validateWordId[ 'value' ];

                        $puth = $this->GetAudioFilePuth( $keyName, $lessonId );

                        if( Storage::disk( 'audio' )->exists( $puth.'/'.$audioFileName ) ){
                            Storage::disk( 'audio' )->delete( $puth.'/'.$audioFileName );
                        };

                        $audioCollection = $this->GetAudioCollectionByWordId( $keyName, $foreignWordId );
                        $audioModel = $audioCollection->where( 'file_name', '=', $audioFileName )->first();

                        if( $audioModel !== null ){
                            $audioModel->delete();
                        };

                        $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                        $result[ 'ok' ] = true;

                    }else{
                        $result[ 'message' ] = $validateWordId[ 'message' ];
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


