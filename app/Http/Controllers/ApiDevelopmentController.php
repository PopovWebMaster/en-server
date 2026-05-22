<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Controllers\Page\Admin\Traits\AddNewWordTrait;
use App\Http\Controllers\Page\Admin\Traits\CheckWordEnForUniqTrait;

class ApiDevelopmentController extends Controller
{
    use AddNewWordTrait;
    use CheckWordEnForUniqTrait;

    
    public function store(Request $request)
    {
        $result = [];

        $route = $request['data']['route'];
        $user = User::find( 1 );

        switch( $route ){


            case 'test-route':
                $result = [
                    'aaa' => 111,
                ];
                break;

            case 'admin/add-new-word':
                $result = $this->AddNewWord( $request, $user );
                break;

            case 'admin/chack-word-en-for-uniq':
                $result = $this->CheckWordEnForUniq( $request, $user );
                break;
            
            
            
            
            
            
            
            
        };

        return response()->json( $result, 200, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Accept,Content-Type,Authorization',
            'Content-Type' => 'application/json; charset=UTF-8'
        ] );


    }

    
}
