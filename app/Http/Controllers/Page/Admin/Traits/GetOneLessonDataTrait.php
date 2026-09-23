<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\PageTitle;
use App\Models\LessonEn;
use App\Models\LessonPhrases;
use App\Models\PageDescription;
use App\Models\PageKeyWords;
use App\Models\PageText;
use App\Models\WordEn;
use App\Models\AudioEn;

use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;



trait GetOneLessonDataTrait{

    use GetWordListTrait;
    use GetLessonModelByIdTrait;


    public function GetOneLessonData( $keyName, $lessonId ){

        $result = [
            'pageTitle' => '',
            'pageDescription' => '',
            'pageKeyWords' => '',
            'pageText' => '',
            'lessonPhrasesList' => [],
            'lessonTitle' => '',
            'lessonDescription' => '',
            'lessonLevelName' => '',
            'lessonIsActive' => '',
            'lessonOrder' => '',
            'lessonIsPaid' => false,
            'wordList' => [],
        ];

        $pageTitleModel = PageTitle::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
        if( $pageTitleModel !== null ){
            $result[ 'pageTitle' ] = $pageTitleModel->title === null? '': $pageTitleModel->title;
        };

        $pageDescriptionModel = PageDescription::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
        if( $pageDescriptionModel !== null ){
            $result[ 'pageDescription' ] = $pageDescriptionModel->description === null? '': $pageDescriptionModel->description;
        };

        $pagePageKeyWordsModel = PageKeyWords::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
        if( $pagePageKeyWordsModel !== null ){
            $result[ 'pageKeyWords' ] = $pagePageKeyWordsModel->keywords === null? '': $pagePageKeyWordsModel->keywords;
        };

        $pagePageTextModel = PageText::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
        if( $pagePageTextModel !== null ){
            $result[ 'pageText' ] = $pagePageTextModel->text === null? '': $pagePageTextModel->text;
        };

        $lessonPhrasesListModel = LessonPhrases::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->get();
        foreach( $lessonPhrasesListModel as $model ){
            array_push( $result[ 'lessonPhrasesList' ], [
                'id' =>         $model->id,
                'foreign' =>    isset( $model->foreign )? $model->foreign: '',
                'ru' =>         isset( $model->ru )? $model->ru: '',
            ] );
        };


        $lessonModel = $this->GetLessonModelById( $keyName, $lessonId );
        if( $lessonModel !== null ){

            $result[ 'lessonTitle' ] =          isset( $lessonModel->title )? $lessonModel->title: '';
            $result[ 'lessonDescription' ] =    isset( $lessonModel->description )? $lessonModel->description: '';
            $result[ 'lessonLevelName' ] =      isset( $lessonModel->level_name )? $lessonModel->level_name: '';
            $result[ 'lessonIsActive' ] =       ( bool ) $lessonModel->is_active;
            $result[ 'lessonOrder' ] =          $lessonModel->order;
            $result[ 'lessonIsPaid' ] =         ( bool ) $lessonModel->is_paid;
            $result[ 'wordList' ] =             $this->GetWordList( $keyName, $lessonId, true  );

        };


        
        
        



        
        
        
        return $result;
        
        
    }

}


?>


