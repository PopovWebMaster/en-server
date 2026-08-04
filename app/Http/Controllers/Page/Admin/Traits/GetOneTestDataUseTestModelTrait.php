<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Tests;
use App\Models\TestLessons;
use App\Models\TestPageTitle;
use App\Models\TestPageDescription;
use App\Models\TestPageKeywords;
use App\Models\TestPageText;


use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;

trait GetOneTestDataUseTestModelTrait{

    use GetLessonModelByIdTrait;
    use GetWordListTrait;

    public function GetOneTestDataUseTestModel( $testModel ){

        $result = [];

        $test_id =      $testModel->id;
        $title =        $testModel->title === null? '': $testModel->title;
        $description =  $testModel->description === null? '': $testModel->description;
        $level_name =   $testModel->level_name === null? '': $testModel->level_name;
        $is_active =    ( bool ) $testModel->is_active;
        $order =        $testModel->order;
        $keyName =      $testModel->key_name;

        $lessons = [];
        $testPageTitle = '';
        $testPageDescription = '';
        $testPageKeywords = '';
        $testPageText = '';
        $wordsCount = 0;

        $testLessonsCollection = TestLessons::where( 'test_id', '=', $test_id )->where( 'key_name', '=', $keyName )->get();
        foreach( $testLessonsCollection as $testLessons ){
            $lessonId = $testLessons->lesson_id;
            $lessonModel = $this->GetLessonModelById( $keyName, $lessonId );
            if( $lessonModel === null ){
                $testLessons->delete();
            }else{
                $lessonWordsCount = count( $this->GetWordList( $keyName, $lessonId ) );
                $wordsCount = $wordsCount + $lessonWordsCount;

                array_push( $lessons, [
                    'id' =>       $lessonId,
                    'title' =>          isset( $lessonModel->title )? $lessonModel->title: '',
                    'description' =>    isset( $lessonModel->description )? $lessonModel->description: '',
                    'levelName' =>      isset( $lessonModel->level_name )? $lessonModel->level_name: '',
                    'isActive' =>       ( bool ) $lessonModel->is_active,
                    'order' =>          $lessonModel->order,
                    'isPaid' =>         ( bool ) $lessonModel->is_paid,
                    'wordsCount' =>     $lessonWordsCount,
                ] );
            };
        };

        $testPageTitleModel = TestPageTitle::where( 'test_id', '=', $test_id )->where( 'key_name', '=', $keyName )->first();
        if( $testPageTitleModel !== null ){
            $testPageTitle = isset( $testPageTitleModel->title )? $testPageTitleModel->title: '';
        };

        $testPageDescriptionModel = TestPageDescription::where( 'test_id', '=', $test_id )->where( 'key_name', '=', $keyName )->first();
        if( $testPageDescriptionModel !== null ){
            $testPageDescription = isset( $testPageDescriptionModel->description )? $testPageDescriptionModel->description: '';
        };

        $testPageKeywordsModel = TestPageKeywords::where( 'test_id', '=', $test_id )->where( 'key_name', '=', $keyName )->first();
        if( $testPageKeywordsModel !== null ){
            $testPageKeywords = isset( $testPageKeywordsModel->keywords )? $testPageKeywordsModel->keywords: '';
        };

        $testPageTextModel = TestPageText::where( 'test_id', '=', $test_id )->where( 'key_name', '=', $keyName )->first();
        if( $testPageTextModel !== null ){
            $testPageText = isset( $testPageTextModel->text )? $testPageTextModel->text: '';
        };

        $result[ 'id' ] =                   $test_id;
        $result[ 'title' ] =                $title;
        $result[ 'description' ] =          $description;
        $result[ 'levelName' ] =            $level_name;
        $result[ 'isActive' ] =             $is_active;
        $result[ 'order' ] =                $order;
        $result[ 'lessons' ] =              $lessons;
        $result[ 'testPageTitle' ] =        $testPageTitle;
        $result[ 'testPageDescription' ] =  $testPageDescription;
        $result[ 'testPageKeywords' ] =     $testPageKeywords;
        $result[ 'testPageText' ] =         $testPageText;
        $result[ 'wordsCount' ] =           $wordsCount;

        return $result;
        
        
    }

}


?>


