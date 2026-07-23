<?php

namespace App\Http\Controllers\Page\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

use Auth;
use App\Models\User;

use App\Http\Controllers\Traits\AddToData\AddToDataIsAdminTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLinksTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataPageDataTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLanguageDataTrait;


// use App\Http\Controllers\Traits\MainData\MainDataTrait;

class HomeController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;
    // use MainDataTrait;

    public function __construct(){
        parent::__construct();

    }

    function get( Request $request ){

        $this->data['robots'] = 'index';

        $this->AddToDataPageData([
            'title' =>          $this->GetSiteTitle(),
            'header' =>         $this->GetSiteHeader(),
            'description' =>    $this->GetSiteDescription(),
            'keywords' =>       $this->GetSiteKeywords(),
            'paragraphList' =>  $this->GetSiteParagraphList(),

        ]);
        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks( 'home' );



        // $user = Auth::user();
        // dd(  );

        // Auth::login();
        // Auth::logout();
        //!!!!!!!!!!!!!!!admin
        // User::create([
        //         'name' => 'Vasyan',
        //         'email' => 'vasyan@mail.ru',
        //         'password' => bcrypt( '123123' ),
        //     ]);
        // User::create([
        //         'name' => 'Genka',
        //         'email' => 'genka@mail.ru',
        //         'password' => bcrypt( '123123' ),
        //     ]);
        // $user = User::find(1);
        // Auth::login($user);
        // dd( $this->data );

        return view( 'home', $this->data );

        
    }
}
