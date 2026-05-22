<?php

namespace App\Http\Controllers\Page\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

use Auth;
use App\Models\User;

class HomeController extends SiteController
{
    public function __construct(){
        parent::__construct();

    }

    function get( Request $request ){

        $this->data['robots'] = 'noindex';
        $this->data['pageTitle'] = 'Главная Home';
        
        $this->data['page'] = 'home';

        $user = Auth::user();
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


        dump( $user );



        return view( 'home', $this->data );

        
    }
}
