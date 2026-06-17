<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;

use App\Http\Controllers\ValidateTraits\ValidateLessonEnTitleTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;

use App\Models\LessonEn;



trait AddNewLessonTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonEnTitleTrait;
    use GetLessonsListTrait;

    public function AddNewLesson( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validadeKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validadeKeyName[ 'ok' ] ){
            $validateLessonEnTitle= $this->ValidateLessonEnTitle( $request );
            if( $validateLessonEnTitle[ 'ok' ] ){
                $kayName =      $validadeKeyName[ 'value' ];
                $lessonTitle =  $validateLessonEnTitle[ 'value' ];
                if( $kayName === 'EN' ){

                    $NewLessonEn = new LessonEn;
                    $NewLessonEn->title = $lessonTitle;
                    $NewLessonEn->save();

                    $result[ 'lessonList' ] = $this->GetLessonsList( $kayName );
                    $result[ 'ok' ] = true;

                }else{
                    $result[ 'message' ] = 'Добавление нового слова для '.$kayName.' не прописано' ;
                };
            }else{
                $result[ 'message' ] = $validateLessonEnTitle[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };


        return $result;
        
        
    }

}


?>


