<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\SaveLessonListChangesTrait;

class SaveLessonListChangesController extends Controller
{
    use SaveLessonListChangesTrait;

    public function post( Request $request ){

        // $user = Auth::user();

        $result = $this->SaveLessonListChanges( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
