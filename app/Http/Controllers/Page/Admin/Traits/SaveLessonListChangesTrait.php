<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\LessonEn;


use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;

trait SaveLessonListChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonListTrait;
    use GetLessonsListTrait;
    use GetLessonModelByIdTrait;

    public function SaveLessonListChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonList = $this->ValidateLessonList( $request );
            if( $validateLessonList[ 'ok' ]){

                $keyName =          $validateKeyName[ 'value' ];
                $lessonList =       $validateLessonList[ 'value' ];

                $arr = [];

                for( $i = 0; $i < count( $lessonList ); $i++ ){

                    $id =           $lessonList[ $i ][ 'id' ];
                    $title =        $lessonList[ $i ][ 'title' ];
                    $description =  $lessonList[ $i ][ 'description' ];
                    $level_name =   $lessonList[ $i ][ 'level_name' ];
                    $is_active =    $lessonList[ $i ][ 'is_active' ];
                    $order =        $lessonList[ $i ][ 'order' ];

                    $lessonModel = $this->GetLessonModelById( $keyName, $id );

                    if( $lessonModel !== null ){
                        $lessonModel->title =          $title;
                        $lessonModel->description =    $description;
                        $lessonModel->level_name =     $level_name;
                        $lessonModel->is_active =      $is_active;
                        $lessonModel->order =          $order;
                        
                        $lessonModel->save();
                    };

                    array_push( $arr, $lessonModel );
                };

                $result[ 'lessonList' ] = $this->GetLessonsList( $keyName );
                $result[ 'ok' ] = true;
                $result[ 'arr' ] = $arr;


    
            }else{
                $result[ 'message' ] = $validateLessonId[ 'message' ];
            };
            
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


