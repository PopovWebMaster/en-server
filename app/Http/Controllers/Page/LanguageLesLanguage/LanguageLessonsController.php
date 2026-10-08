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
use App\Http\Controllers\Traits\GetMySuccessStringTrait;
use App\Http\Controllers\Traits\GetGuestIdTrait;


class LanguageLessonsController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;
    use GetAllLessonsForViewTrait;
    use GetKeyNameFromLanguageAliasTrait;
    use GetMySuccessStringTrait;
    use GetGuestIdTrait;

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

        $this->data[ 'lessonsList' ] = $lessonsList;

        $guestId = $this->GetGuestId();
        for( $i = 0; $i < count( $this->data[ 'languageActiveList' ] ); $i++ ){
            if( $i === 0 ){
                $this->data[ 'mySuccessList' ] = [];
            };
            $key_name = $this->data[ 'languageActiveList' ][ $i ];
            array_push( $this->data[ 'mySuccessList' ], [
                'icon' => config( 'languages.languages.'.$key_name.'.icon' ),
                'countString' => $this->GetMySuccessString( $guestId, $key_name ),
            ] );

        };


        // $this->data[ 'mySuccessList' ] = $this->GetMySuccessString( $guestId, $keyName );

        // dd( $this->data );





        // $this->data[ 'keyName' ] = $keyName;


        // dd( $this->data );


        return view( 'language_lessons', $this->data );

        
    }
}
