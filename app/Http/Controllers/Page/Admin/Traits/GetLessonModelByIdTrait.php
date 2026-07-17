<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\LessonEn;
use App\Models\LessonCn;
use App\Models\LessonDe;
use App\Models\LessonEs;
use App\Models\LessonFr;
use App\Models\LessonGr;
use App\Models\LessonIt;
use App\Models\LessonJp;
use App\Models\LessonKr;
use App\Models\LessonTr;

trait GetLessonModelByIdTrait{

    public function GetLessonModelById( $keyName, $lessonId ){

        $result = null;

        if( $keyName === 'EN' ){
            $result = LessonEn::where( 'id', '=', $lessonId )->first();

        }else if( $keyName === 'DE' ){
            $result = LessonDe::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'CN' ){
            $result = LessonCn::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'FR' ){
            $result = LessonFr::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'ES' ){
            $result = LessonEs::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'IT' ){
            $result = LessonIt::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'GR' ){
            $result = LessonGr::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'JP' ){
            $result = LessonJp::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'KR' ){
            $result = LessonKr::where( 'id', '=', $lessonId )->first();
            
        }else if( $keyName === 'TR' ){
            $result = LessonTr::where( 'id', '=', $lessonId )->first();
            
        };


        return $result;
        
        
    }

}


?>


