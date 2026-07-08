<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\AddNewLessonPhraseTrait;

class AddNewLessonPhraseController extends Controller
{
    use AddNewLessonPhraseTrait;

    public function post( Request $request ){

        $result = $this->AddNewLessonPhrase( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
