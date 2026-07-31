<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\RemoveOneTestTrait;

class RemoveOneTestController extends Controller
{
    use RemoveOneTestTrait;

    public function post( Request $request ){

        $result = $this->RemoveOneTest( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
