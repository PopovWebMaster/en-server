<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\Page\Admin\Traits\MoveWordToLessonTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;

use App\Models\LessonPhrases;
use App\Models\PageDescription;
use App\Models\PageKeyWords;
use App\Models\PageText;
use App\Models\PageTitle;


trait RemoveLessonTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetWordListTrait;
    use MoveWordToLessonTrait;
    use GetLessonModelByIdTrait;

    public function RemoveLesson( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){
                $keyName =          $validateKeyName[ 'value' ];
                $lessonId =         $validateLessonId[ 'value' ];

                $words = $this->GetWordList( $keyName, $lessonId );

                for( $i = 0; $i < count( $words ); $i++ ){
                    $wordId = $words[ $i ][ 'id' ];
                    $this->MoveWordToLesson([
                        'keyName' =>    $keyName,
                        'lessonId' =>   null,
                        'wordId' =>     $wordId,
                    ]);
                };

                $lessonModel = $this->GetLessonModelById( $keyName, $lessonId );
                if( $lessonModel !== null ){
                    $lessonModel->delete();
                };


                $pageTitleModel = PageTitle::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageTitleModel !== null ){
                    $pageTitleModel->delete();
                };

                $pageDescriptionModel = PageDescription::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageDescriptionModel !== null ){
                    $pageDescriptionModel->delete();
                };

                $pageKeyWordsModel = PageKeyWords::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageKeyWordsModel !== null ){
                    $pageKeyWordsModel->delete();
                };

                $pageTextModel = PageText::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageTextModel !== null ){
                    $pageTextModel->delete();
                };

                $lessonPhrasesListModel = LessonPhrases::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->get();
                if( count( $lessonPhrasesListModel ) > 0 ){
                    $lessonPhrasesListModel->map->delete();
                };

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


