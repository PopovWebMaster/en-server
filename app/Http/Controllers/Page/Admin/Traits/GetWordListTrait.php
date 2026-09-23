<?php 

namespace App\Http\Controllers\Page\Admin\Traits;



use App\Http\Controllers\Page\Admin\Traits\GetAudioCollectionByWordIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordCollectionByLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetPartOfSpeechListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetTopicsListTrait;

use App\Http\Controllers\Page\Admin\Traits\GetDataOnUniquenessOfForeignWordTrait;


use App\Http\Controllers\Traits\GetAudioBase64Trait;

trait GetWordListTrait{

    use GetAudioBase64Trait;
    use GetAudioCollectionByWordIdTrait;
    use GetWordCollectionByLessonIdTrait;
    use GetPartOfSpeechListTrait;
    use GetTopicsListTrait;
    use GetDataOnUniquenessOfForeignWordTrait;

    public function GetWordList( $keyName, $lessonId = null, $fullInfo = false ){

        $result = [];

        $POSList = $this->GetPartOfSpeechList();
        $posObj = [];
        for( $i = 0; $i < count( $POSList ); $i++ ){
            $id = $POSList[$i][ 'id' ];
            $posObj[ $id ] = true;
        };
        $topicsList = $this->GetTopicsList();
        $topicsObj = [];
        for( $i = 0; $i < count( $topicsList ); $i++ ){
            $id = $topicsList[$i][ 'id' ];
            $topicsObj[ $id ] = true;
        };

        $wordCollection = $this->GetWordCollectionByLessonId( $keyName, $lessonId );
        foreach( $wordCollection as $model ){
            $word_id =          $model->id;
            $foreign =          $this->GetForeignWordFromModel( $keyName, $model );
            $ru =               $model->ru === null? '': $model->ru;
            $transcription =    $model->transcription === null? '': $model->transcription;

            $part_of_speech_id =    $model->part_of_speech_id;
            $topic_id =             $model->topic_id;

            $mustSave = false;

            if( $part_of_speech_id !== null ){
                if( isset( $posObj[ $part_of_speech_id ] )){

                }else{
                    $part_of_speech_id = null;
                    $model->part_of_speech_id = null;
                    $mustSave = true;
                };
            };
           
            if( $topic_id !== null ){
                if( isset( $topicsObj[ $topic_id ] ) ){

                }else{
                    $topic_id = null;
                    $model->topic_id = null;
                    $mustSave = true;
                };
            };

            if( $mustSave ){
                $model->save();
            };



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

            $message = '';

            if( $fullInfo ){
                $uniqData = $this->GetDataOnUniquenessOfForeignWord([
                    'wordForeign' =>    $foreign,
                    'keyName' =>        $keyName,
                    'wordId' => $word_id,
                ]);
                $message = $uniqData[ 'message' ];
            };



            array_push( $result, [
                'id' =>             $word_id,
                'foreign' =>        $foreign,
                'ru' =>             $ru,
                'transcription' =>  $transcription,
                'keyName' =>        $keyName,
                'audio' =>          $audio,
                'part_of_speech_id' => $part_of_speech_id,
                'topic_id' =>       $topic_id,
                'message' => $message,
            ] );  


        };

        return $result;
        
        
    }


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


