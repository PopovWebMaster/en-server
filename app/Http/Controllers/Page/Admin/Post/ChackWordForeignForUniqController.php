<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\CheckWordForeignForUniqTrait;

class ChackWordForeignForUniqController extends Controller
{
    use CheckWordForeignForUniqTrait;

    public function post( Request $request ){


        $result = $this->CheckWordForeignForUniq( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
