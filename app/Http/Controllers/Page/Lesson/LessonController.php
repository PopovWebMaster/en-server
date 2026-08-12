<?php

namespace App\Http\Controllers\Page\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

// use Auth;
// use App\Models\User;

use App\Http\Controllers\Traits\AddToData\AddToDataIsAdminTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLinksTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataPageDataTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLanguageDataTrait;
use App\Http\Controllers\Traits\GetOneLessonPageDataTrait;

use App\Http\Controllers\Traits\GetWordsByLessonIdTrait;

class LessonController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;

    use GetOneLessonPageDataTrait;
    use GetWordsByLessonIdTrait;

    public function __construct(){
        parent::__construct();

    }

    function get( Request $request, $languageAlias, $lessonId ){

        $this->data['robots'] = 'index';

        $keyName = strtoupper( $languageAlias );

        $oneLessonPageData = $this->GetOneLessonPageData( $keyName, $lessonId );

        $levelName =        $oneLessonPageData[ 'levelName' ];

        $this->AddToDataPageData([
            'title' =>          $oneLessonPageData[ 'pageTitle' ],
            'header' =>         $oneLessonPageData[ 'pageHeader' ],
            'description' =>    $oneLessonPageData[ 'pageDescription' ],
            'keywords' =>       $oneLessonPageData[ 'pageKeywords' ],
            'paragraphList' =>  $oneLessonPageData[ 'pageParagraphList' ],

        ]);

        $words = $this->GetWordsByLessonId( $keyName, $lessonId );

        $this->data[ 'levelName' ] = $levelName;
        $this->data[ 'wordsCount' ] = count( $words );
        $this->data[ 'words_json' ] = json_encode( $words, JSON_UNESCAPED_UNICODE );
        $this->data[ 'words' ] = $words;

        $this->data[ 'keyName' ] =  $keyName;
        $this->data[ 'lessonId' ] = $lessonId;
        // $this->data[ 'testId' ] =   null; // тут чтоб в тестах не забыть




        // dd( $this->data );

        // $this->data[ 'words_json' ] = json_encode( $words, JSON_FORCE_OBJECT );

        // $this->data[ 'words_json' ] = json_encode( $words );





        // dd( $this->data[ 'words_json' ] );









        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks();

        return view( 'one_lesson', $this->data );

        
    }
}
