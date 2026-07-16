<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\Page\Admin\Traits\GetUniqFileNameTrait;
use App\Http\Controllers\Traits\GetAudioFilePuthTrait;

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


trait CreateAudioFileTrait{

    use GetUniqFileNameTrait;
    use GetAudioFilePuthTrait;

    public function CreateAudioFile( $params ){

        $keyName =          $params[ 'keyName' ];
        $word_foreign_id =  $params[ 'word_foreign_id' ];
        $base64 =           $params[ 'base64' ];
        $name =             $params[ 'name' ];
        $lessonId =         isset( $params[ 'lessonId' ] )? $params[ 'lessonId' ]: null; // null  or id

        $puth = $this->GetAudioFilePuth( $keyName, $lessonId );
        $fileNameUnic = $this->GetUniqFileName( $name, $puth );

        if( $keyName === 'EN' ){

            $audioEn = AudioEn::where( 'word_en_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioEn === null ){
                $audioEnModel = new AudioEn;
                $audioEnModel->word_en_id = $word_foreign_id;
                $audioEnModel->lesson_en_id = $lessonId;
                $audioEnModel->file_name = $fileNameUnic;
                $audioEnModel->save();
            };

        }else if( $keyName === 'DE' ){

            $audioDe = AudioDe::where( 'word_de_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioDe === null ){
                $audioDeModel = new AudioDe;
                $audioDeModel->word_de_id =     $word_foreign_id;
                $audioDeModel->lesson_de_id =   $lessonId;
                $audioDeModel->file_name =      $fileNameUnic;
                $audioDeModel->save();
            };

        }else if( $keyName === 'CN' ){

            $audioCn = AudioCn::where( 'word_cn_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioCn === null ){
                $audioCnModel = new AudioCn;
                $audioCnModel->word_cn_id =     $word_foreign_id;
                $audioCnModel->lesson_cn_id =   $lessonId;
                $audioCnModel->file_name =      $fileNameUnic;
                $audioCnModel->save();
            };

        }else if( $keyName === 'FR' ){

            $audioFr = AudioFr::where( 'word_fr_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioFr === null ){
                $audioFrModel = new AudioFr;
                $audioFrModel->word_fr_id =     $word_foreign_id;
                $audioFrModel->lesson_fr_id =   $lessonId;
                $audioFrModel->file_name =      $fileNameUnic;
                $audioFrModel->save();
            };

        }else if( $keyName === 'ES' ){

            $audioEs = AudioEs::where( 'word_es_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioEs === null ){
                $audioEsModel = new AudioEs;
                $audioEsModel->word_es_id =     $word_foreign_id;
                $audioEsModel->lesson_es_id =   $lessonId;
                $audioEsModel->file_name =      $fileNameUnic;
                $audioEsModel->save();
            };

        }else if( $keyName === 'IT' ){

            $audioIt = AudioIt::where( 'word_it_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioIt === null ){
                $audioItModel = new AudioIt;
                $audioItModel->word_it_id =     $word_foreign_id;
                $audioItModel->lesson_it_id =   $lessonId;
                $audioItModel->file_name =      $fileNameUnic;
                $audioItModel->save();
            };

        }else if( $keyName === 'GR' ){

            $audioGr = AudioGr::where( 'word_gr_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioGr === null ){
                $audioGrModel = new AudioGr;
                $audioGrModel->word_gr_id =     $word_foreign_id;
                $audioGrModel->lesson_gr_id =   $lessonId;
                $audioGrModel->file_name =      $fileNameUnic;
                $audioGrModel->save();
            };

        }else if( $keyName === 'JP' ){

            $audioJp = AudioJp::where( 'word_jp_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioJp === null ){
                $audioJpModel = new AudioJp;
                $audioJpModel->word_jp_id =     $word_foreign_id;
                $audioJpModel->lesson_jp_id =   $lessonId;
                $audioJpModel->file_name =      $fileNameUnic;
                $audioJpModel->save();
            };

        }else if( $keyName === 'KR' ){

            $audioKr = AudioKr::where( 'word_kr_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioKr === null ){
                $audioKrModel = new AudioKr;
                $audioKrModel->word_kr_id =     $word_foreign_id;
                $audioKrModel->lesson_kr_id =   $lessonId;
                $audioKrModel->file_name =      $fileNameUnic;
                $audioKrModel->save();
            };

        }else if( $keyName === 'TR' ){

            $audioTr = AudioTr::where( 'word_tr_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioTr === null ){
                $audioTrModel = new AudioTr;
                $audioTrModel->word_tr_id =     $word_foreign_id;
                $audioTrModel->lesson_tr_id =   $lessonId;
                $audioTrModel->file_name =      $fileNameUnic;
                $audioTrModel->save();
            };

        };

        Storage::disk( 'audio' )->put( $puth.'/'.$fileNameUnic, base64_decode( $base64 ) );

       
        // if( $keyName === 'EN' ){

        
        //     $audioEn = AudioEn::where( 'word_en_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
        //     if( $audioEn === null ){
        //         $audioEnModel = new AudioEn;
        //         $audioEnModel->word_en_id = $word_foreign_id;
        //         $audioEnModel->lesson_en_id = $lessonId;
        //         $audioEnModel->file_name = $fileNameUnic;
        //         $audioEnModel->save();
        //     };

        //     $result = $fileNameUnic;

        // };

        return $fileNameUnic;
        

    }

}


?>


