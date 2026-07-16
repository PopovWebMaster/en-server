<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordRuTrait;
use App\Http\Controllers\ValidateTraits\ValidateTranscriptionTrait;
use App\Http\Controllers\ValidateTraits\ValidateAudioFilesArrTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordForeignTrait;



// use App\Http\Controllers\Page\Admin\Traits\CreateFreeWordEnTrait; // <<<<<<<<<<<<<<<<<<
use App\Http\Controllers\Page\Admin\Traits\CreateFreeWordTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\Page\Admin\Traits\MoveWordToLessonTrait;



trait AddNewWordTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use ValidateWordRuTrait;
    use ValidateTranscriptionTrait;
    use ValidateAudioFilesArrTrait;
    use ValidateWordForeignTrait;
    // use CreateFreeWordEnTrait;// <<<<<<<<<<<<<<<<<<
    use CreateFreeWordTrait;
    use GetWordListTrait;
    use MoveWordToLessonTrait;

    public function AddNewWord( $request, $user ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validadeKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validadeKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ] ){
                $validateWordRu = $this->ValidateWordRu( $request );
                if( $validateWordRu[ 'ok' ] ){
                    $validateTranscription = $this->ValidateTranscription( $request );
                    if( $validateTranscription[ 'ok' ] ){
                        $validateFiles = $this->ValidateAudioFilesArr( $request );
                        if( $validateFiles[ 'ok' ] ){
                            $validateWordForeign = $this->ValidateWordForeign( $request, true );
                            if( $validateWordForeign[ 'ok' ] ){

                                $keyName =          $validadeKeyName[ 'value' ];
                                $word_ru =          $validateWordRu[ 'value' ];
                                $transcription =    $validateTranscription[ 'value' ];
                                $files =            $validateFiles[ 'value' ];
                                $lessonId =         $validateLessonId[ 'value' ];
                                $wordForeign =      $validateWordForeign[ 'value' ];

                                $wordId = $this->CreateFreeWord([
                                    'keyName' =>        $keyName,
                                    'word_foreign' =>   $wordForeign,
                                    'word_ru' =>        $word_ru,
                                    'transcription' =>  $transcription,
                                    'files' =>          $files,
                                ]);

                                $this->MoveWordToLesson([
                                    'keyName' =>    $keyName,
                                    'lessonId' =>   $lessonId,
                                    'wordId' =>     $wordId,

                                ]);

                                $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                                $result[ 'ok' ] = true;

                            }else{
                                $result[ 'message' ] = $validateWordForeign[ 'message' ];
                            };
                        }else{
                            $result[ 'message' ] = $validateFiles[ 'message' ];
                        };
                    }else{
                        $result[ 'message' ] = $validateTranscription[ 'message' ];
                    };
                }else{
                    $result[ 'message' ] = $validateWordRu[ 'message' ];
                };














            }else{
                $result[ 'message' ] = $validateLessonId[ 'message' ];
            };






            // $validateWordRu = $this->ValidateWordRu( $request );
            // if( $validateWordRu[ 'ok' ] ){
            //     $validateTranscription = $this->ValidateTranscription( $request );
            //     if( $validateTranscription[ 'ok' ] ){
            //         $validateFiles = $this->ValidateAudioFilesArr( $request );
            //         if( $validateFiles[ 'ok' ] ){

            //             $kayName =          $validadeKeyName[ 'value' ];
            //             $word_ru =          $validateWordRu[ 'value' ];
            //             $transcription =    $validateTranscription[ 'value' ];
            //             $files =            $validateFiles[ 'value' ];
            //             $lessonId =         isset( $request[ 'data' ][ 'lessonId' ] )? isset( $request[ 'data' ][ 'lessonId' ] )? $request[ 'data' ][ 'lessonId' ]: null: null;;

            //             $validateWordForeign = $this->ValidateWordForeign( $request, true );

            //             if( $validateWordForeign[ 'ok' ] ){
                            
            //                 // $word_en = $validateWordForeign[ 'value' ];

            //                 // $wordId = $this->CreateFreeWordEn([
            //                 //     'kayName' =>        $kayName,
            //                 //     'word_en' =>        $word_en,
            //                 //     'word_ru' =>        $word_ru,
            //                 //     'transcription' =>  $transcription,
            //                 //     'files' =>          $files,
            //                 // ]);

            //                 // $this->MoveWordToLesson([
            //                 //     'keyName' =>    $kayName,
            //                 //     'lessonId' =>   $lessonId,
            //                 //     'wordId' =>     $wordId,

            //                 // ]);


            //                 // $result[ 'wordList' ] = $this->GetWordList( $kayName, $lessonId );
            //                 // $result[ 'ok' ] = true;

            //             }else{
            //                 $result[ 'message' ] = $validateWordForeign[ 'message' ];
            //             };
            //         }else{
            //             $result[ 'message' ] = $validateFiles[ 'message' ];
            //         };
            //     }else{
            //         $result[ 'message' ] = $validateTranscription[ 'message' ];
            //     };
            // }else{
            //     $result[ 'message' ] = $validateWordRu[ 'message' ];
            // };


















        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

/*
        $data = $request->all();

        // if( Storage::disk('audio_buffer')->exists() ){
        //     $result[ 'storage' ] =  'yes!';
        //     // Storage::disk('audio_buffer')->delete( $puth );
        // };

        // $result[ 'file' ] =  $data[ 'data' ]['files'][0]->getClientOriginalExtension();
        $result[ 'file' ] =  $data[ 'data' ]['files'];

        $name = $data[ 'data' ]['files'][ 0 ][ 'name' ];
        $base64 = $data[ 'data' ]['files'][ 0 ][ 'base64' ];
        $puth = Storage::disk( 'audio_buffer' )->path('/');

        $result[ 'name' ] =  $name;
        $result[ 'base64' ] =  $base64;
        $result[ 'puth' ] =  $puth;

        file_put_contents( $puth.$name, base64_decode($base64));
*/





        // $request->file('audio')

       
        

        return $result;
        
        
    }

}


?>


