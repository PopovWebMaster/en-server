<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
// use App\Http\Controllers\ValidateTraits\ValidateWordRuTrait;
// use App\Http\Controllers\ValidateTraits\ValidateTranscriptionTrait;
use App\Http\Controllers\ValidateTraits\ValidateAudioFilesArrTrait;
// use App\Http\Controllers\ValidateTraits\ValidateWordEnTrait;

// use App\Http\Controllers\Page\Admin\Traits\CreateFreeWordEnTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;

use App\Http\Controllers\ValidateTraits\ValidateWordEnIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\CreateAudioFileTrait;

use App\Models\WordEn;

trait AddAudioToWordTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateWordEnIdTrait;
    use ValidateLessonIdTrait;
    // use ValidateWordRuTrait;
    // use ValidateTranscriptionTrait;
    use ValidateAudioFilesArrTrait;
    // use ValidateWordEnTrait;
    // use CreateFreeWordEnTrait;
    use GetWordListTrait;
    use CreateAudioFileTrait;

    public function AddAudioToWord( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );

        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){
                $validateFiles = $this->ValidateAudioFilesArr( $request );
                if( $validateFiles[ 'ok' ] ){
                    $keyName = $validateKeyName[ 'value' ];

                    if( $keyName === 'EN' ){
                        $validateWordEnId = $this->ValidateWordEnId( $request );
                    };

                    if( $validateWordEnId === null ){
                        $result[ 'message' ] = 'Не прописан метод для языка '.$keyName;
                    }else{

                        $files = $validateFiles[ 'value' ];
                        $foreignWordId =    $validateWordEnId[ 'value' ];
                        $lessonId =         $validateLessonId[ 'value' ];

                        for( $i = 0; $i < count( $files ); $i++ ){
                            $name = $files[ $i ][ 'name' ];
                            $base64 = $files[ $i ][ 'base64' ];

                            $res = $this->CreateAudioFile([
                                'keyName' =>    $keyName,
                                'word_foreign_id' => $foreignWordId, 
                                'name' =>       $name,
                                'base64' =>     $base64,
                            ]);


                        };

                        $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                        $result[ 'ok' ] = true;

                    };
                }else{
                    $result[ 'message' ] = $validateFiles[ 'message' ];
                };
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


