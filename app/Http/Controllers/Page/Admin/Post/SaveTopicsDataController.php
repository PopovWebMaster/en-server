<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\SaveTopicsDataChangesTrait;

class SaveTopicsDataController extends Controller
{
    use SaveTopicsDataChangesTrait;

    public function post( Request $request ){

        // $user = Auth::user();

        $result = $this->SaveTopicsDataChanges( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
