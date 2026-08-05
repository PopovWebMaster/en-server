<?php 

namespace App\Http\Controllers\Traits;

use App\Models\Tests;
use App\Models\TestPageTitle;
use App\Models\TestPageText;
use App\Models\TestPageKeywords;
use App\Models\TestPageDescription;
use App\Models\TestLessons;

use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;


trait GetOneTestPageDataTrait{

    use GetLessonModelByIdTrait;

    public function GetOneTestPageData( $keyName, $testId ){

        $result = [
            'pageTitle' =>          '',
            'pageHeader' =>         '',
            'pageDescription' =>    '',
            'pageKeywords' =>       '',
            'pageParagraphList' =>  [],

            'isActive' => false,
            'levelName' => '',

            'lessonsIdList' => [],


        ];

        $testModel = Tests::where( 'id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
        if( $testModel !== null ){
            $result[ 'pageHeader' ] =   $testModel->title;
            $result[ 'isActive' ] =     $testModel->is_active;
            $result[ 'levelName' ] =    $testModel->level_name;
        };

        $testPageTitle = TestPageTitle::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
        if( $testPageTitle !== null ){
            $result[ 'pageTitle' ] =    $testPageTitle->title;
        };

        $testPageText = TestPageText::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
        if( $testPageText !== null ){
            $text = $testPageText->text;
            $arr = explode("\n", $text);
            $result[ 'pageParagraphList' ] = $arr;
        };

        $testPageKeywords = TestPageKeywords::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
        if( $testPageKeywords !== null ){
            $result[ 'pageKeywords' ] =    $testPageKeywords->keywords;
        };

        $testPageDescription = TestPageDescription::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
        if( $testPageDescription !== null ){
            $result[ 'pageDescription' ] =    $testPageDescription->description;
        };

        $testLessons = TestLessons::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->get();
        for( $i = 0; $i < count( $testLessons ); $i++ ){

            $lessonId = $testLessons[ $i ]->lesson_id;

            $lessonModel = $this->GetLessonModelById( $keyName, $lessonId );
            if( $lessonModel !== null ){
                if( $lessonModel->is_active ){
                    array_push( $result[ 'lessonsIdList' ], $lessonId );
                };
            };

        };
        
       
        return $result;
        
        
    }

}


?>


