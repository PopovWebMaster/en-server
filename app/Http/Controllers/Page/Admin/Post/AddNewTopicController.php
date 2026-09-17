<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\AddNewTopicTrait;

class AddNewTopicController extends Controller
{
    use AddNewTopicTrait;

    public function post( Request $request ){

        $result = $this->AddNewTopic( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
