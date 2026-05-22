<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;


use Auth;
use App\Models\User;

class AdminController extends SiteController
{
    public function __construct(){
        parent::__construct();

    }

    function get( Request $request ){

        $this->data['robots'] = 'noindex';
        $this->data['pageTitle'] = 'Админка';
        
        $this->data['page'] = 'admin';

        // $user = Auth::user();




        return view( 'admin', $this->data );

        
    }

}
