<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\AddNewTestTrait;

class AddNewTestController extends Controller
{
    use AddNewTestTrait;

    public function post( Request $request ){

        $result = $this->AddNewTest( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
