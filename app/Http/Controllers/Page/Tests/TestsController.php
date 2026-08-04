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



class TestsController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;

    use GetAllTestsForViewTrait;

    use MainDataTrait;

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
}
