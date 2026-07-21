<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\RemoveLessonTrait;

class RemoveLessonController extends Controller
{
    use RemoveLessonTrait;

    public function post( Request $request ){

        // $user = Auth::user();

        $result = $this->RemoveLesson( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
