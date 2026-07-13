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



trait GetOneLessonDataTrait{

    use GetWordListTrait;


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

        if( $keyName === 'EN' ){
            $lessonEn = LessonEn::find( $lessonId  );
            if( $lessonEn !== null ){

                $result[ 'lessonTitle' ] =          isset( $lessonEn->title )? $lessonEn->title: '';
                $result[ 'lessonDescription' ] =    isset( $lessonEn->description )? $lessonEn->description: '';
                $result[ 'lessonLevelName' ] =      isset( $lessonEn->level_name )? $lessonEn->level_name: '';
                $result[ 'lessonIsActive' ] =       ( bool ) $lessonEn->is_active;
                $result[ 'lessonOrder' ] =          $lessonEn->order;
                $result[ 'lessonIsPaid' ] =         ( bool ) $lessonEn->is_paid;
                $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );

            };


        };


        
        
        



        
        
        
        return $result;
        
        
    }

}


?>


