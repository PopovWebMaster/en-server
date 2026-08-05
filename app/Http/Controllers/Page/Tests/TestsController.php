<?php

namespace App\Http\Controllers\Page\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

// use Auth;
// use App\Models\User;

use App\Http\Controllers\Traits\AddToData\AddToDataIsAdminTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLinksTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataPageDataTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLanguageDataTrait;
use App\Http\Controllers\Traits\MainData\MainDataTrait;

use App\Http\Controllers\Traits\GetAllTestsForViewTrait;

use App\Http\Controllers\Traits\GetOneTestPageDataTrait;
use App\Http\Controllers\Traits\GetWordsByLessonsIdListTrait;



class TestsController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;

    use GetAllTestsForViewTrait;

    use MainDataTrait;

    use GetOneTestPageDataTrait;
    use GetWordsByLessonsIdListTrait;

    public function __construct(){
        parent::__construct();

    }

    function get( Request $request ){

        $this->data['robots'] = 'index';

        $this->AddToDataPageData([
            'title' =>          $this->GetTestsListPageTitle(),
            'header' =>         $this->GetTestsListPageHeader(),
            'description' =>    $this->GetTestsListPageDescription(),
            'keywords' =>       $this->GetTestsListPageKeywords(),
            'paragraphList' =>  $this->GetTestsListPageParagraphList(),

        ]);
        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks( 'tests' );

        $this->data[ 'allTestsList' ] = $this->GetAllTestsForView();

        // dd( $this->data );

        return view( 'tests', $this->data );

    }

    function getForList( Request $request, $languageAlias ){

        $this->data['robots'] = 'index';

        $keyName = strtoupper( $languageAlias );

        $this->AddToDataPageData([
            'title' =>          $this->GetTestLanguagePageTitle( $keyName ),
            'header' =>         $this->GetTestLanguagePageHeader( $keyName ),
            'description' =>    $this->GetTestLanguagePageDescription( $keyName ),
            'keywords' =>       $this->GetTestLanguagePageKeywords( $keyName ),
            'paragraphList' =>  $this->GetTestLanguagePageParagraphList( $keyName ),

        ]);
        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        // $this->AddToDataLinks( 'tests' );
        $this->AddToDataLinks();

        $allTestsList = $this->GetAllTestsForView();

        $this->data[ 'keyName' ] =      $keyName;
        $this->data[ 'languageIcon' ] = $allTestsList[ $keyName ][ 'languageIcon' ];

        $this->data[ 'testsList' ] = $allTestsList[ $keyName ][ 'tests' ];

        // dd( $this->data );

        return view( 'language_tests', $this->data );

    }

    function getForOneTest( Request $request, $languageAlias, $testId ){

        $this->data['robots'] = 'index';

        $keyName = strtoupper( $languageAlias );

        $oneTestPageData = $this->GetOneTestPageData( $keyName, $testId );

        $isActive =         $oneTestPageData[ 'isActive' ];
        $levelName =        $oneTestPageData[ 'levelName' ];
        $lessonsIdList =    $oneTestPageData[ 'lessonsIdList' ];

        $this->AddToDataPageData([
            'title' =>          $oneTestPageData[ 'pageTitle' ],
            'header' =>         $oneTestPageData[ 'pageHeader' ],
            'description' =>    $oneTestPageData[ 'pageDescription' ],
            'keywords' =>       $oneTestPageData[ 'pageKeywords' ],
            'paragraphList' =>  $oneTestPageData[ 'pageParagraphList' ],
        ]);

        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks();

        $words = $this->GetWordsByLessonsIdList( $keyName, $lessonsIdList );

        $this->data[ 'levelName' ] = $levelName;
        $this->data[ 'wordsCount' ] = count( $words );


        // dd( $this->data );

        return view( 'one_test', $this->data );

    }
}
