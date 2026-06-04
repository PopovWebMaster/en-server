<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Http\Controllers\Page\Admin\Traits\GetStartingDataTrait;

class GetStartingDataController extends Controller
{
    use GetStartingDataTrait;

    public function post( Request $request ){

        $user = Auth::user();

        $result = $this->GetStartingData( $request, $user );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
