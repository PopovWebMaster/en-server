<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Page\Admin\Traits\RemoveOneWordTrait;

class RemoveOneWordController extends Controller
{
    use RemoveOneWordTrait;

    public function post( Request $request ){

        // $user = Auth::user();

        $result = $this->RemoveOneWord( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
