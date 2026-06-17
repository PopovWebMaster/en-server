<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\AddNewLessonTrait;

class AddNewLessonController extends Controller
{
    use AddNewLessonTrait;

    public function post( Request $request ){

        $result = $this->AddNewLesson( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
