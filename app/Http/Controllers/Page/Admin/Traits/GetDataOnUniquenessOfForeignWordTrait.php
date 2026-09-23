<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\Page\Admin\Traits\GetWordModelByRequestTrait;
use App\Http\Controllers\Page\Admin\Traits\GetPartOfSpeechListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;

trait GetDataOnUniquenessOfForeignWordTrait{

    use GetWordModelByRequestTrait;
    use GetPartOfSpeechListTrait;
    use GetLessonModelByIdTrait;

    public function GetDataOnUniquenessOfForeignWord( $params ){

        $wordForeign =  $params[ 'wordForeign' ];
        $keyName =      $params[ 'keyName' ];
        $wordId =      isset( $params[ 'wordId' ] )? $params[ 'wordId' ]: null;


        

        $result = [
            'message' => '',
            'isUniq' => false,
        ];

        $wordCollection = $this->GetWordModelByRequest( $keyName, strtolower( $keyName ), $wordForeign );

        if( count( $wordCollection ) === 0 ){
            $result[ 'isUniq' ] = true;
        }else{
            $message = [];
            $leson_key = "lesson_".strtolower( $keyName )."_id";

            $POS = $this->GetPartOfSpeechList();

            foreach( $wordCollection as $model ){
                if( $model->id !== $wordId ){
                    $lesson_id = $model->$leson_key;
                    $part_of_speech_id = $model->part_of_speech_id;

                    $POS_Name = ' (Часть речи не указана)';
                    for( $i = 0; $i < count( $POS ); $i++ ){
                        if( $POS[ $i ]['id'] === $part_of_speech_id ){
                            $POS_Name = ' '.$POS[ $i ]['name'].' ';
                        };
                    };

                    $lessonName = 'Новые слова';
                    if( $lesson_id !== null ){
                        $lessonModel = $this->GetLessonModelById( $keyName, $lesson_id );
                        if( $lessonModel === null ){
                            $lessonName = 'в уроке с id-'.$lesson_id;
                        }else{
                            $title = $lessonModel->title;
                            $lessonName = 'в уроке "'.$title.'"';
                        };
                    };
                    array_push( $message, $wordForeign.$POS_Name." ".$lessonName  );
                };
            };

            if( count( $message ) === 0 ){
                $result[ 'isUniq' ] = true;
            };

            $text = '';
            for( $i = 0; $i < count( $message ); $i++ ){
                if( $i === 0 ){
                    $text = 'Повторяется! ';
                };
                $text = $text.$message[ $i ].', ';
            };

            $result[ 'message' ] = $text;

        };

        return $result;
        
        
    }

}


?>


