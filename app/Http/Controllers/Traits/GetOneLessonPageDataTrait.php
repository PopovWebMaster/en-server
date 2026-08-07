<?php 

namespace App\Http\Controllers\Traits;

use App\Models\PageTitle;
use App\Models\PageText;
use App\Models\PageKeyWords;
use App\Models\PageDescription;

use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;


trait GetOneLessonPageDataTrait{

    use GetLessonModelByIdTrait;

    public function GetOneLessonPageData( $keyName, $lessonId ){

        $result = [
            'pageTitle' =>          '',
            'pageHeader' =>         '',
            'pageDescription' =>    '',
            'pageKeywords' =>       '',
            'pageParagraphList' =>  [],

            'isActive' => false,
            'levelName' => '',

        ];

        $lessonModel = $this->GetLessonModelById( $keyName, $lessonId );
        if( $lessonModel !== null ){
            $result[ 'pageHeader' ] =   $lessonModel->title;
            $result[ 'isActive' ] =     $lessonModel->is_active;
            $result[ 'levelName' ] =    $lessonModel->level_name;
        };

        $lessonPageTitle = PageTitle::where( 'lesson_id', '=', $lessonId )->where( 'key_name', '=', $keyName )->first();
        if( $lessonPageTitle !== null ){
            $result[ 'pageTitle' ] = $lessonPageTitle->title;
        };

        $lessonPageText = PageText::where( 'lesson_id', '=', $lessonId )->where( 'key_name', '=', $keyName )->first();
        if( $lessonPageText !== null ){
           $text = $lessonPageText->text;
            $arr = explode("\n", $text);
            $result[ 'pageParagraphList' ] = $arr;
        };

        $lessonPageKeyWords = PageKeyWords::where( 'lesson_id', '=', $lessonId )->where( 'key_name', '=', $keyName )->first();
        if( $lessonPageKeyWords !== null ){
            $result[ 'pageKeywords' ] =    $lessonPageKeyWords->keywords;
        };

        
        $lessonPageDescription = PageDescription::where( 'lesson_id', '=', $lessonId )->where( 'key_name', '=', $keyName )->first();
        if( $lessonPageDescription !== null ){
            $result[ 'pageDescription' ] = $lessonPageDescription->description;
        };
       
        return $result;
        
        
    }

}


?>


