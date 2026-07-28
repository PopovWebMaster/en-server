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

class LessonController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;

    public function __construct(){
        parent::__construct();

    }

    function get( Request $request, $languageAlias, $id = null ){

        $this->data['robots'] = 'index';

        $this->AddToDataPageData([
            'title' =>          'Урок',
            'header' =>         'Урок',
            'description' =>    '',
            'keywords' =>       '',
            'paragraphList' =>  [],

        ]);
        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks( 'lesson' );

        return view( 'lesson', $this->data );

        
    }
}
