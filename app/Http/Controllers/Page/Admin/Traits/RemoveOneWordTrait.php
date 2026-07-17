<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;

// use App\Http\Controllers\ValidateTraits\ValidateWordEnIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordIdTrait;
use App\Http\Controllers\Traits\GetAudioFilePuthTrait;
use App\Http\Controllers\Page\Admin\Traits\MoveWordToLessonTrait;

use App\Http\Controllers\Page\Admin\Traits\GetAudioCollectionByWordIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordModelByIdTrait;

trait RemoveOneWordTrait{

    use ValidateLanguageKeyNameTrait;
    // use ValidateWordEnIdTrait;
    use ValidateWordIdTrait;
    use ValidateLessonIdTrait;

    use GetWordListTrait;
    use GetAudioFilePuthTrait;
    use MoveWordToLessonTrait;

    use GetAudioCollectionByWordIdTrait;
    use GetWordModelByIdTrait;

    public function RemoveOneWord( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){
                    $validateWordId = $this->ValidateWordId( $request );
                    if( $validateWordId[ 'ok' ] ){

                        $keyName =          $validateKeyName[ 'value' ];
                        $foreignWordId =    $validateWordId[ 'value' ];
                        $lessonId =         $validateLessonId[ 'value' ];

                        if( $lessonId === null ){

                            $audioFileNames = [];
                            $audioModels = $this->GetAudioCollectionByWordId( $keyName, $foreignWordId );
                            foreach( $audioModels as $audioModel ){
                                $file_name = $audioModel->file_name;
                                array_push( $audioFileNames, $file_name );
                                $audioModel->delete();
                            };

                            $puth = $this->GetAudioFilePuth( $keyName, $lessonId );
                            for( $i = 0; $i < count( $audioFileNames ); $i++ ){
                                $audioFileName = $audioFileNames[ $i ];
                                if( Storage::disk( 'audio' )->exists( $puth.'/'.$audioFileName ) ){
                                    Storage::disk( 'audio' )->delete( $puth.'/'.$audioFileName );
                                };
                            };

                            $wordModel = $this->GetWordModelById( $keyName, $foreignWordId );
                            if( $wordModel !== null ){
                                $wordModel->delete();
                            };

                        }else{
                            $this->MoveWordToLesson([
                                'keyName' =>    $keyName,
                                'lessonId' =>   null,
                                'wordId' =>     $foreignWordId,
                            ]);
                        };

                        $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                        $result[ 'ok' ] = true;

                    }else{
                        $result[ 'message' ] = $validateWordEnId[ 'message' ];
                    };
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


