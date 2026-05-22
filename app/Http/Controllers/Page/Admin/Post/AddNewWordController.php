<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\Page\Admin\Traits\AddNewWordTrait;

class AddNewWordController extends Controller
{
    use AddNewWordTrait;

    public function post( Request $request ){

        $user = Auth::user();

        $result = $this->AddNewWord( $request, $user );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
