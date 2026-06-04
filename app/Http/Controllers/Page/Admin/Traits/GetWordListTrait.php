<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use App\Http\Controllers\Traits\GetAudioBase64Trait;

trait GetWordListTrait{

    use GetAudioBase64Trait;

    public function GetWordList( $keyName, $lessonId = null ){

        $result = [];

        if( $keyName === 'EN' ){

            $wordEn = WordEn::where( 'lesson_en_id', '=', $lessonId )->get();
            foreach( $wordEn as $model ){

                $word_en_id =       $model->id;
                $foreign =          $model->en;
                $ru =               $model->ru === null? '': $model->ru;
                $transcription =    $model->transcription === null? '': $model->transcription;

                $audio = [];

                $audioEn = AudioEn::where( 'word_en_id', '=', $word_en_id )->get();
                foreach( $audioEn as $audioModel ){
                    $name = $audioModel->file_name;

                    $base64 = $this->GetAudioBase64([
                        'keyName' =>    $keyName,
                        'name' =>       $name,
                        'lessonId' =>   $lessonId,
                    ]);

                    array_push( $audio, [
                        'name' => $name,
                        'base64' => $base64,
                    ] );
                };

                array_push( $result, [
                    'id' =>             $word_en_id,
                    'foreign' =>        $foreign,
                    'ru' =>             $ru,
                    'transcription' =>  $transcription,
                    'audio' =>          $audio,
                ] );  
            };

        };
        
        
        
        return $result;
        
        
    }

}


?>


