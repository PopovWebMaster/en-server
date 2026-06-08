<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Controllers\Page\Admin\Traits\AddNewWordTrait;
use App\Http\Controllers\Page\Admin\Traits\CheckWordEnForUniqTrait;
use App\Http\Controllers\Page\Admin\Traits\CheckWordForeignForUniqTrait;
use App\Http\Controllers\Page\Admin\Traits\GetStartingDataTrait;
use App\Http\Controllers\Page\Admin\Traits\RemoveAudioFileTrait;
use App\Http\Controllers\Page\Admin\Traits\AddAudioToWordTrait;
use App\Http\Controllers\Page\Admin\Traits\SaveWordListChangesTrait;


class ApiDevelopmentController extends Controller
{
    use AddNewWordTrait;
    use CheckWordForeignForUniqTrait;
    use GetStartingDataTrait;
    use RemoveAudioFileTrait;
    use AddAudioToWordTrait;
    use SaveWordListChangesTrait;

    
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

            case 'admin/chack-word-foreign-for-uniq':
                $result = $this->CheckWordForeignForUniq( $request, $user );
                break;

            case 'admin/get-starting-data':
                $result = $this->GetStartingData( $request, $user );
                break;

            case 'admin/remove-audio-file':
                $result = $this->RemoveAudioFile( $request, $user );
                break;
            
            case 'admin/add-audio-files-to-word':
                $result = $this->AddAudioToWord( $request );
                break;

            case 'admin/save-word-list-changes':
                $result = $this->SaveWordListChanges( $request );
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
