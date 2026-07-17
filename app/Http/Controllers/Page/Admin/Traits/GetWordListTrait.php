<?php 

namespace App\Http\Controllers\Page\Admin\Traits;



use App\Http\Controllers\Page\Admin\Traits\GetAudioCollectionByWordIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordCollectionByLessonIdTrait;


use App\Http\Controllers\Traits\GetAudioBase64Trait;

trait GetWordListTrait{

    use GetAudioBase64Trait;
    use GetAudioCollectionByWordIdTrait;
    use GetWordCollectionByLessonIdTrait;

    public function GetWordList( $keyName, $lessonId = null ){

        $result = [];

        $wordCollection = $this->GetWordCollectionByLessonId( $keyName, $lessonId );
        foreach( $wordCollection as $model ){
            $word_id =          $model->id;
            $foreign =          $this->GetForeignWordFromModel( $keyName, $model );
            $ru =               $model->ru === null? '': $model->ru;
            $transcription =    $model->transcription === null? '': $model->transcription;

            $audio = [];
            $audioCollection = $this->GetAudioCollectionByWordId( $keyName, $word_id );
            foreach( $audioCollection as $audioModel ){
                $name = $audioModel->file_name;

                $base64 = $this->GetAudioBase64([
                    'keyName' =>    $keyName,
                    'name' =>       $name,
                    'lessonId' =>   $lessonId,
                ]);

                if( $base64 === '' ){
                    $audioModel->delete();
                }else{
                    array_push( $audio, [
                        'name' => $name,
                        'base64' => $base64,
                    ] );
                };
            };

            array_push( $result, [
                'id' =>             $word_id,
                'foreign' =>        $foreign,
                'ru' =>             $ru,
                'transcription' =>  $transcription,
                'keyName' =>        $keyName,
                'audio' =>          $audio,
            ] );  


        };

        return $result;
        
        
    }

    // private function GetWordCollectionByLessonId( $keyName, $lessonId ){
    //     $result = [];
    //     if( $keyName === 'EN' ){
    //         $result = WordEn::where( 'lesson_en_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'DE' ){
    //         $result = WordDe::where( 'lesson_de_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'CN' ){
    //         $result = WordCn::where( 'lesson_cn_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'FR' ){
    //         $result = WordFr::where( 'lesson_fr_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'ES' ){
    //         $result = WordEs::where( 'lesson_es_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'IT' ){
    //         $result = WordIt::where( 'lesson_it_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'GR' ){
    //         $result = WordGr::where( 'lesson_gr_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'JP' ){
    //         $result = WordJp::where( 'lesson_jp_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'KR' ){
    //         $result = WordKr::where( 'lesson_kr_id', '=', $lessonId )->get();

    //     }else if( $keyName === 'TR' ){
    //         $result = WordTr::where( 'lesson_tr_id', '=', $lessonId )->get();

    //     };

    //     return $result;
    // }

    // private function GetAudioCollectionByWordId( $keyName, $wordId ){
    //     $result = [];
    //     if( $keyName === 'EN' ){
    //         $result = AudioEn::where( 'word_en_id', '=', $wordId )->get();

    //     }else if( $keyName === 'DE' ){
    //         $result = AudioDe::where( 'word_de_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'CN' ){
    //         $result = AudioCn::where( 'word_cn_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'FR' ){
    //         $result = AudioFr::where( 'word_fr_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'ES' ){
    //         $result = AudioEs::where( 'word_es_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'IT' ){
    //         $result = AudioIt::where( 'word_it_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'GR' ){
    //         $result = AudioGr::where( 'word_gr_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'JP' ){
    //         $result = AudioJp::where( 'word_jp_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'KR' ){
    //         $result = AudioKr::where( 'word_kr_id', '=', $wordId )->get();
            
    //     }else if( $keyName === 'TR' ){
    //         $result = AudioTr::where( 'word_tr_id', '=', $wordId )->get();
            
    //     };

    //     return $result;
    // }

    private function GetForeignWordFromModel( $keyName, $model ){
        $result = '';
        if( $keyName === 'EN' ){
            $result = $model->en === null? '': $model->en;
        }else if( $keyName === 'DE' ){
            $result = $model->de === null? '': $model->de;
        }else if( $keyName === 'CN' ){
            $result = $model->cn === null? '': $model->cn;
        }else if( $keyName === 'FR' ){
            $result = $model->fr === null? '': $model->fr;
        }else if( $keyName === 'ES' ){
            $result = $model->es === null? '': $model->es;
        }else if( $keyName === 'IT' ){
            $result = $model->it === null? '': $model->it;
        }else if( $keyName === 'GR' ){
            $result = $model->gr === null? '': $model->gr;
        }else if( $keyName === 'JP' ){
            $result = $model->jp === null? '': $model->jp;
        }else if( $keyName === 'KR' ){
            $result = $model->kr === null? '': $model->kr;
        }else if( $keyName === 'TR' ){
            $result = $model->tr === null? '': $model->tr;
        };
        return $result;
    }

}


?>


