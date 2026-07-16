<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;

use App\Http\Controllers\ValidateTraits\ValidateLessonTitleTrait; 
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;

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



trait AddNewLessonTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonTitleTrait;
    use GetLessonsListTrait;

    public function AddNewLesson( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validadeKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validadeKeyName[ 'ok' ] ){
            $validateLessonTitle= $this->ValidateLessonTitle( $request );
            if( $validateLessonTitle[ 'ok' ] ){

                $keyName =      $validadeKeyName[ 'value' ];
                $lessonTitle =  $validateLessonTitle[ 'value' ];

                $lessonModel = null;

                if( $keyName === 'EN' ){
                    $lessonModel = new LessonEn;

                }else if( $keyName === 'DE' ){
                    $lessonModel = new LessonDe;

                }else if( $keyName === 'CN' ){
                    $lessonModel = new LessonCn;

                }else if( $keyName === 'FR' ){
                    $lessonModel = new LessonFr;

                }else if( $keyName === 'ES' ){
                    $lessonModel = new LessonEs;

                }else if( $keyName === 'IT' ){
                    $lessonModel = new LessonIt;

                }else if( $keyName === 'GR' ){
                    $lessonModel = new LessonGr;

                }else if( $keyName === 'JP' ){
                    $lessonModel = new LessonJp;

                }else if( $keyName === 'KR' ){
                    $lessonModel = new LessonKr;

                }else if( $keyName === 'TR' ){
                    $lessonModel = new LessonTr;

                };

                if( $lessonModel === null ){
                    $result[ 'message' ] = 'Добавление нового урока для '.$keyName.' не прописано. AddNewLessonTrait' ;
                }else{
                    $lessonModel->title = $lessonTitle;
                    $lessonModel->save();

                    $result[ 'lessonList' ] = $this->GetLessonsList( $keyName );
                    $result[ 'ok' ] = true;
                };

            }else{
                $result[ 'message' ] = $validateLessonTitle[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };


        return $result;
        
        
    }

}


?>


