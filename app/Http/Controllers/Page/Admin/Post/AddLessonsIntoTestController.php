<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\AddLessonsIntoTestTrait;

class AddLessonsIntoTestController extends Controller
{
    use AddLessonsIntoTestTrait;

    public function post( Request $request ){

        $result = $this->AddLessonsIntoTest( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
