<?php

namespace App\Http\Controllers\Page\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class TestController extends Controller
{
    public function post( Request $request ){

        $user = Auth::user();


        $result = $request->all();

        $result[ 'user' ] = $user;

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
