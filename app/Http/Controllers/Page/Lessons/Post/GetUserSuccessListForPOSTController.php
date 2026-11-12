<?php

namespace App\Http\Controllers\Page\Lessons\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Lessons\Traits\GetUserSuccessListForPOSTtrait;

class GetUserSuccessListForPOSTController extends Controller
{
    use GetUserSuccessListForPOSTtrait;

    public function post( Request $request ){

        $result = $this->GetUserSuccessListForPOST( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
