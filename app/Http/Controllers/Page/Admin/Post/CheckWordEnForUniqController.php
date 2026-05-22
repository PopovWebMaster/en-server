<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Auth;
use App\Http\Controllers\Page\Admin\Traits\CheckWordEnForUniqTrait;

class CheckWordEnForUniqController extends Controller
{
    use CheckWordEnForUniqTrait;

    public function post( Request $request ){

        // $user = Auth::user();

        $result = $this->CheckWordEnForUniq( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
