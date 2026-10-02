<?php

namespace App\Http\Controllers\Page\Lessons\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Lessons\Traits\SaveUserLessonResultTrait;

class SaveUserLessonResultController extends Controller
{
    use SaveUserLessonResultTrait;

    public function post( Request $request ){

        $result = $this->SaveUserLessonResult( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
