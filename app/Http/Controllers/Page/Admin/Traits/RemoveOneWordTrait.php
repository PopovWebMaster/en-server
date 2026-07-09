<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;

use App\Http\Controllers\ValidateTraits\ValidateWordEnIdTrait;
use App\Http\Controllers\Traits\GetAudioFilePuthTrait;
use App\Http\Controllers\Page\Admin\Traits\MoveWordToLessonTrait;

trait RemoveOneWordTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateWordEnIdTrait;
    use ValidateLessonIdTrait;

    use GetWordListTrait;
    use GetAudioFilePuthTrait;
    use MoveWordToLessonTrait;

    public function RemoveOneWord( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $keyName = $validateKeyName[ 'value' ];

            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){
                if( $keyName === 'EN' ){
                    $validateWordEnId = $this->ValidateWordEnId( $request );
                    if( $validateWordEnId[ 'ok' ] ){
                        $foreignWordId = $validateWordEnId[ 'value' ];
                        $lessonId = $validateLessonId[ 'value' ];

                        if( $lessonId === null ){
                            $audioFileNames = [];

                            $audioEnModels = AudioEn::where( 'word_en_id', '=', $foreignWordId )->get();
                            foreach( $audioEnModels as $audioModel ){
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

                            $wordEn = WordEn::where( 'id', '=', $foreignWordId )->first();
                            if( $wordEn !== null ){
                                $wordEn->delete();
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


