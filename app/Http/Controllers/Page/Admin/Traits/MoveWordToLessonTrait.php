<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\WordCn;
use App\Models\WordDe;
use App\Models\WordEs;
use App\Models\WordFr;
use App\Models\WordGr;
use App\Models\WordIt;
use App\Models\WordJp;
use App\Models\WordKr;
use App\Models\WordTr;


use App\Models\AudioCn;
use App\Models\AudioDe;
use App\Models\AudioEn;
use App\Models\AudioEs;
use App\Models\AudioFr;
use App\Models\AudioGr;
use App\Models\AudioIt;
use App\Models\AudioJp;
use App\Models\AudioKr;
use App\Models\AudioTr;




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

        }else if( $keyName === 'DE' ){
            $wordModel = WordDe::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_de_id !== $lessonId ){
                    $wordModel->lesson_de_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioDe::where( 'word_de_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_de_id;
                        $file_name =    $model->file_name;

                        $model->lesson_de_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'CN' ){
            $wordModel = WordCn::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_cn_id !== $lessonId ){
                    $wordModel->lesson_cn_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioCn::where( 'word_cn_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_cn_id;
                        $file_name =    $model->file_name;

                        $model->lesson_cn_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'FR' ){
            $wordModel = WordFr::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_fr_id !== $lessonId ){
                    $wordModel->lesson_fr_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioFr::where( 'word_fr_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_fr_id;
                        $file_name =    $model->file_name;

                        $model->lesson_fr_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'ES' ){
            $wordModel = WordEs::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_es_id !== $lessonId ){
                    $wordModel->lesson_es_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioEs::where( 'word_es_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_es_id;
                        $file_name =    $model->file_name;

                        $model->lesson_es_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'IT' ){
            $wordModel = WordIt::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_it_id !== $lessonId ){
                    $wordModel->lesson_it_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioIt::where( 'word_it_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_it_id;
                        $file_name =    $model->file_name;

                        $model->lesson_it_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'GR' ){
            $wordModel = WordGr::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_gr_id !== $lessonId ){
                    $wordModel->lesson_gr_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioGr::where( 'word_gr_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_gr_id;
                        $file_name =    $model->file_name;

                        $model->lesson_gr_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'JP' ){
            $wordModel = WordJp::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_jp_id !== $lessonId ){
                    $wordModel->lesson_jp_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioJp::where( 'word_jp_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_jp_id;
                        $file_name =    $model->file_name;

                        $model->lesson_jp_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'KR' ){
            $wordModel = WordKr::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_kr_id !== $lessonId ){
                    $wordModel->lesson_kr_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioKr::where( 'word_kr_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_kr_id;
                        $file_name =    $model->file_name;

                        $model->lesson_kr_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        }else if( $keyName === 'TR' ){
            $wordModel = WordTr::find( $wordId );
            if( $wordModel !== null ){
                if( $wordModel->lesson_tr_id !== $lessonId ){
                    $wordModel->lesson_tr_id = $lessonId;
                    $wordModel->save();

                    $audioModel = AudioTr::where( 'word_tr_id', '=', $wordId )->get();
                    foreach( $audioModel as $model ){

                        $old_lessonId = $model->lesson_tr_id;
                        $file_name =    $model->file_name;

                        $model->lesson_tr_id =  $lessonId;
                        $model->save();

                        $puth_old = $this->GetAudioFilePuth( $keyName, $old_lessonId );
                        $puth_new = $this->GetAudioFilePuth( $keyName, $lessonId );

                        Storage::disk( 'audio' )->move( $puth_old.'/'.$file_name, $puth_new.'/'.$file_name );

                    };
                };
            };
        };







        /*

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
        */
        
        
        return $result;
        
        
    }

}


?>


