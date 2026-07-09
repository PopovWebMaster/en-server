<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use Storage;

use App\Http\Controllers\Traits\GetAudioFilePuthTrait;


trait MoveWordToLessonTrait{

    use GetAudioFilePuthTrait;

    public function MoveWordToLesson( $params ){

        $keyName =  $params[ 'keyName' ];
        $lessonId = $params[ 'lessonId' ];
        $wordId =   $params[ 'wordId' ];

        $result = [];

        if( $keyName === 'EN' ){
            $wordEnModel = WordEn::find( $wordId );
            if( $wordEnModel !== null ){

                if( $wordEnModel->lesson_en_id !== $lessonId ){
                    
                    $wordEnModel->lesson_en_id = $lessonId;
                    $wordEnModel->save();

                    $audioEnModel = AudioEn::where( 'word_en_id', '=', $wordId )->get();
                    foreach( $audioEnModel as $model ){

                        $old_lessonId = $model->lesson_en_id;
                        $file_name =    $model->file_name;

                        $model->lesson_en_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };


                };
            };
        };
        
        
        
        return $result;
        
        
    }

}


?>


