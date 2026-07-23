<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LogoutController extends Controller
{
    public function __construct(){
        // parent::__construct();

    }

    function get( Request $request ){

        Auth::logout();
        return redirect('/');

    }
}
