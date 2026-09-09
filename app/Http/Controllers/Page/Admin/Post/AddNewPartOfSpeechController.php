<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\AddNewPartOfSpeechTrait;

class AddNewPartOfSpeechController extends Controller
{
     use AddNewPartOfSpeechTrait;

    public function post( Request $request ){

        $result = $this->AddNewPartOfSpeech( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
