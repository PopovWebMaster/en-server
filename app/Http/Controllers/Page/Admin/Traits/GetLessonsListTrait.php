<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
// use App\Models\AudioEn;
// use App\Models\LessonEn;

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

use App\Http\Controllers\Page\Admin\Traits\GetWordCollectionByLessonIdTrait;

trait GetLessonsListTrait{

    use GetWordCollectionByLessonIdTrait;


    public function GetLessonsList( $keyName ){

        $result = [];

        $lessonCollection = [];

        if( $keyName === 'EN' ){
            $lessonCollection = LessonEn::get();
        }else if( $keyName === 'DE' ){
            $lessonCollection = LessonDe::get();
        }else if( $keyName === 'CN' ){
            $lessonCollection = LessonCn::get();
        }else if( $keyName === 'FR' ){
            $lessonCollection = LessonFr::get();
        }else if( $keyName === 'ES' ){
            $lessonCollection = LessonEs::get();
        }else if( $keyName === 'IT' ){
            $lessonCollection = LessonIt::get();
        }else if( $keyName === 'GR' ){
            $lessonCollection = LessonGr::get();
        }else if( $keyName === 'JP' ){
            $lessonCollection = LessonJp::get();
        }else if( $keyName === 'KR' ){
            $lessonCollection = LessonKr::get();
        }else if( $keyName === 'TR' ){
            $lessonCollection = LessonTr::get();
        };

        foreach( $lessonCollection as $model ){
            $lessonId =     $model->id;
            $title =        $model->title === null? '': $model->title;
            $description =  $model->description === null? '': $model->description;
            $level_name =   $model->level_name === null? '': $model->level_name;
            $is_active =    ( bool ) $model->is_active;
            $order =        $model->order;
            $isPaid =       ( bool ) $model->is_paid;

            $wordCollection = $this->GetWordCollectionByLessonId( $keyName, $lessonId );
            $wordsCount = count( $wordCollection );

            array_push( $result, [
                'id' =>             $lessonId,
                'title' =>          $title,
                'description' =>    $description,
                'level_name' =>     $level_name,
                'is_active' =>      $is_active,
                'wordsCount' =>     $wordsCount,
                'order' => $order,
                'isPaid' => $isPaid,
            ] );  

        };



        /*
        if( $keyName === 'EN' ){
            $lessonEn = LessonEn::get();
            foreach( $lessonEn as $model ){
                $lesson_en_id = $model->id;
                $title =        $model->title === null? '': $model->title;
                $description =  $model->description === null? '': $model->description;
                $level_name =   $model->level_name === null? '': $model->level_name;
                $is_active =    ( bool ) $model->is_active;
                $order =        $model->order;
                $isPaid =       ( bool ) $model->is_paid;



                $wordEn = WordEn::where( 'lesson_en_id', '=', $lesson_en_id )->get();
                $wordsCount = count( $wordEn );

                array_push( $result, [
                    'id' =>             $lesson_en_id,
                    'title' =>          $title,
                    'description' =>    $description,
                    'level_name' =>     $level_name,
                    'is_active' =>      $is_active,
                    'wordsCount' =>     $wordsCount,
                    'order' => $order,
                    'isPaid' => $isPaid,
                ] );  

            };

        };
        */
        
        
        return $result;
        
        
    }

}


?>


