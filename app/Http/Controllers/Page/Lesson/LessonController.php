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
use App\Http\Controllers\Page\Admin\Traits\GetAppDataTrait;

use App\Http\Controllers\Traits\GetGuestIdTrait;
use App\Http\Controllers\Traits\GetOneUserLessonScoreTrait;
// use App\Http\Controllers\Traits\GetMySuccessStringTrait;

// use Storage;

class LessonController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;

    use GetOneLessonPageDataTrait;
    use GetWordsByLessonIdTrait;
    use GetAppDataTrait;
    use GetGuestIdTrait;
    use GetOneUserLessonScoreTrait;
    // use GetMySuccessStringTrait;

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
        $appData = $this->GetAppData( $keyName );


        $this->data[ 'levelName' ] = $levelName;
        $this->data[ 'wordsCount' ] = count( $words );
        $this->data[ 'words_json' ] = json_encode( $words, JSON_UNESCAPED_UNICODE );
        $this->data[ 'appData_json' ] = json_encode( $appData, JSON_UNESCAPED_UNICODE );

        $this->data[ 'words' ] = $words;

        $this->data[ 'keyName' ] =  $keyName;
        $this->data[ 'lessonId' ] = $lessonId;

        $guestId = $this->GetGuestId();
        if( $guestId !== null ){
            $lessonScore = $this->GetOneUserLessonScore( $guestId, $keyName, $lessonId );
            if( $lessonScore !== null ){
                $this->data[ 'lessonScore' ] = $lessonScore;
            };
        };

        // $this->data[ 'mySuccessString' ] = $this->GetMySuccessString( $guestId, $keyName );






        // dd( $this->data );
        // $this->data[ 'testId' ] =   null; // тут чтоб в тестах не забыть


        // dd( $request->cookie( 'coockieTest' ) );




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
