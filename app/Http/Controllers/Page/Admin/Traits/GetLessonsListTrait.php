<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
// use App\Models\AudioEn;
use App\Models\LessonEn;

trait GetLessonsListTrait{


    public function GetLessonsList( $keyName ){

        $result = [];

        if( $keyName === 'EN' ){
            $lessonEn = LessonEn::get();
            foreach( $lessonEn as $model ){
                $lesson_en_id = $model->id;
                $title =        $model->title === null? '': $model->title;
                $description =  $model->description === null? '': $model->description;
                $level_name =   $model->level_name === null? '': $model->level_name;
                $is_active =    ( bool ) $model->is_active;
                $order =        $model->order;


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
                ] );  

            };

        };
        
        
        
        return $result;
        
        
    }

}


?>


