<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\Traits\GetAudioFilePuthTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordModelByIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetAudioCollectionByWordIdTrait;


trait MoveWordToLessonTrait{

    use GetAudioFilePuthTrait;
    use GetWordModelByIdTrait;
    use GetAudioCollectionByWordIdTrait;

    public function MoveWordToLesson( $params ){

        $keyName =  $params[ 'keyName' ];
        $lessonId = $params[ 'lessonId' ];
        $wordId =   $params[ 'wordId' ];

        $result = [];

        $wordModel = $this->GetWordModelById( $keyName, $wordId );
        if( $wordModel !== null ){

            $keyName_low = strtolower( $keyName );
            $lesson_foreign_id = 'lesson_'.$keyName_low.'_id';

            if( $wordModel->$lesson_foreign_id !== $lessonId ){
                    
                $wordModel->$lesson_foreign_id = $lessonId;
                $wordModel->save();

                $audioCollection = $this->GetAudioCollectionByWordId( $keyName, $wordId );
                foreach( $audioCollection as $model ){

                    $old_lessonId = $model->$lesson_foreign_id;
                    $file_name =    $model->file_name;

                    $model->$lesson_foreign_id =  $lessonId;
                    $model->save();

                    $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                    $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                    Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                };
            };
        };

        return $result;
        
    }

}


?>


