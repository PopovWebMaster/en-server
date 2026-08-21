<?php

namespace App\Http\Controllers\Page\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Page\Admin\Traits\SaveSettingsDataChangesTrait;

class SaveSettingsDataChangesController extends Controller
{
    use SaveSettingsDataChangesTrait;

    public function post( Request $request ){

        // $user = Auth::user();

        $result = $this->SaveSettingsDataChanges( $request );

        return response()->json( $result, 200, ['Content-Type' => 'application/json; charset=UTF-8'] );

    }
}
