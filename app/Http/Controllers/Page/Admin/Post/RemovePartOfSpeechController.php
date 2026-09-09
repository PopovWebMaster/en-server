<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\RemovePartOfSpeechTrait;

class RemovePartOfSpeechController extends Controller
{
    use RemovePartOfSpeechTrait;

    public function post( Request $request ){

        $result = $this->RemovePartOfSpeech( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
