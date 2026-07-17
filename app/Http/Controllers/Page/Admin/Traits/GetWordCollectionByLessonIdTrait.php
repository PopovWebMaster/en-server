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

trait GetWordCollectionByLessonIdTrait{

    public function GetWordCollectionByLessonId( $keyName, $lessonId ){
        $result = [];
        if( $keyName === 'EN' ){
            $result = WordEn::where( 'lesson_en_id', '=', $lessonId )->get();

        }else if( $keyName === 'DE' ){
            $result = WordDe::where( 'lesson_de_id', '=', $lessonId )->get();

        }else if( $keyName === 'CN' ){
            $result = WordCn::where( 'lesson_cn_id', '=', $lessonId )->get();

        }else if( $keyName === 'FR' ){
            $result = WordFr::where( 'lesson_fr_id', '=', $lessonId )->get();

        }else if( $keyName === 'ES' ){
            $result = WordEs::where( 'lesson_es_id', '=', $lessonId )->get();

        }else if( $keyName === 'IT' ){
            $result = WordIt::where( 'lesson_it_id', '=', $lessonId )->get();

        }else if( $keyName === 'GR' ){
            $result = WordGr::where( 'lesson_gr_id', '=', $lessonId )->get();

        }else if( $keyName === 'JP' ){
            $result = WordJp::where( 'lesson_jp_id', '=', $lessonId )->get();

        }else if( $keyName === 'KR' ){
            $result = WordKr::where( 'lesson_kr_id', '=', $lessonId )->get();

        }else if( $keyName === 'TR' ){
            $result = WordTr::where( 'lesson_tr_id', '=', $lessonId )->get();

        };

        return $result;
    }

    

}


?>


