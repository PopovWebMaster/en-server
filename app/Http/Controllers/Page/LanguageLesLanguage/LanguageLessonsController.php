<?php

namespace App\Http\Controllers\Page\LanguageLesLanguage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

use App\Http\Controllers\Traits\AddToData\AddToDataIsAdminTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLinksTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataPageDataTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLanguageDataTrait;
use App\Http\Controllers\Traits\GetAllLessonsForViewTrait;
use App\Http\Controllers\Traits\GetKeyNameFromLanguageAliasTrait;

class LanguageLessonsController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;
    use GetAllLessonsForViewTrait;
    use GetKeyNameFromLanguageAliasTrait;

     public function __construct(){
        parent::__construct();

    }

    function get( Request $request, $languageAlias ){

        $this->data['robots'] = 'index';

        $keyName = $this->GetKeyNameFromLanguageAlias( $languageAlias );

        $this->AddToDataPageData([
            'title' =>          $this->GetLanguagePageTitle( $keyName ),
            'header' =>         $this->GetLanguagePageHeader( $keyName ),
            'description' =>    $this->GetLanguagePageDescription( $keyName ),
            'keywords' =>       $this->GetLanguagePageKeywords( $keyName ),
            'paragraphList' =>  $this->GetLanguagePageParagraphList( $keyName ),

        ]);


        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks( 'language_lessons' );

        $allLessonsList = $this->GetAllLessonsForView();

        $lessonsList = $allLessonsList[ $keyName ][ 'lessons' ];

         $this->data[ 'keyName' ] =             $allLessonsList[ $keyName ][ 'keyName' ];
         $this->data[ 'languageIcon' ] =        $allLessonsList[ $keyName ][ 'languageIcon' ];
        //  $this->data[ 'keylanguageNameName' ] = $allLessonsList[ $keyName ][ 'keylanguageNameName' ];
        //  $this->data[ 'buttonIsActive' ] =      $allLessonsList[ $keyName ][ 'buttonIsActive' ];
        //  $this->data[ 'isOpen' ] =              $allLessonsList[ $keyName ][ 'isOpen' ];
        //  $this->data[ 'oneLanguageRoute' ] =    $allLessonsList[ $keyName ][ 'oneLanguageRoute' ];





        $this->data[ 'lessonsList' ] = $lessonsList;





        // $this->data[ 'keyName' ] = $keyName;


        // dd( $this->data );


        return view( 'language_lessons', $this->data );

        
    }
}
