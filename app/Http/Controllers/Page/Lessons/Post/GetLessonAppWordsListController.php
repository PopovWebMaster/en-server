<?php

namespace App\Http\Controllers\Page\Lessons\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Lessons\Traits\GetLessonAppWordsListTrait;

class GetLessonAppWordsListController extends Controller
{
    use GetLessonAppWordsListTrait;

    public function post( Request $request ){

        $result = $this->GetLessonAppWordsList( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
