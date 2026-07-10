<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\GetFreeWordsListTrait;

class GetFreeWordsListController extends Controller
{
    use GetFreeWordsListTrait;

    public function post( Request $request ){

        // $user = Auth::user();

        $result = $this->GetFreeWordsList( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
