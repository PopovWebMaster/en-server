<?php

namespace App\Http\Controllers\Page\Lessons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

// use Auth;
// use App\Models\User;

use App\Http\Controllers\Traits\AddToData\AddToDataIsAdminTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLinksTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataPageDataTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLanguageDataTrait;
use App\Http\Controllers\Traits\GetAllLessonsForViewTrait;

class LessonsController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;
    use GetAllLessonsForViewTrait;

    public function __construct(){
        parent::__construct();

    }

    function get( Request $request ){

        $this->data['robots'] = 'index';

        $this->AddToDataPageData([
            'title' =>          $this->GetLessonsListPageTitle(),
            'header' =>         $this->GetLessonsListPageHeader(),
            'description' =>    $this->GetLessonsListPageDescription(),
            'keywords' =>       $this->GetLessonsListPageKeywords(),
            'paragraphList' =>  $this->GetLessonsListPageParagraphList(),

        ]);
        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks( 'lessons' );

        $this->data[ 'allLessonsList' ] = $this->GetAllLessonsForView();



        return view( 'lessons', $this->data );

        
    }
}
