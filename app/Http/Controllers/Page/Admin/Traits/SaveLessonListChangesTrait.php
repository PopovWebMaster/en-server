<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

// use App\Models\WordEn;
use App\Models\LessonEn;

// use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;

trait SaveLessonListChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonListTrait;
    use GetLessonsListTrait;

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

                if( $keyName === 'EN' ){

                    for( $i = 0; $i < count( $lessonList ); $i++ ){

                        $id =           $lessonList[ $i ][ 'id' ];
                        $title =        $lessonList[ $i ][ 'title' ];
                        $description =  $lessonList[ $i ][ 'description' ];
                        $level_name =   $lessonList[ $i ][ 'level_name' ];
                        $is_active =    $lessonList[ $i ][ 'is_active' ];
                        $order =        $lessonList[ $i ][ 'order' ];

                        $lessonEn = LessonEn::where( 'id', '=', $id )->first();

                        if( $lessonEn !== null ){
                            $lessonEn->title =          $title;
                            $lessonEn->description =    $description;
                            $lessonEn->level_name =     $level_name;
                            $lessonEn->is_active =      $is_active;
                            $lessonEn->order =          $order;
                            
                            $lessonEn->save();
                        };
                    };

                };

                $result[ 'lessonList' ] = $this->GetLessonsList( $keyName );
                $result[ 'ok' ] = true;

    
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


