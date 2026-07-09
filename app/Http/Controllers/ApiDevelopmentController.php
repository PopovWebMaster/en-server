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
use App\Http\Controllers\Page\Admin\Traits\RemoveOneWordTrait;
use App\Http\Controllers\Page\Admin\Traits\AddNewLessonTrait;
use App\Http\Controllers\Page\Admin\Traits\SaveLessonListChangesTrait;
use App\Http\Controllers\Page\Admin\Traits\SaveOneLessonDataChangesTrait;
use App\Http\Controllers\Page\Admin\Traits\AddNewLessonPhraseTrait;
use App\Http\Controllers\Page\Admin\Traits\RemoveOneLessonPhraseTrait;




class ApiDevelopmentController extends Controller
{
    use AddNewWordTrait;
    use CheckWordForeignForUniqTrait;
    use GetStartingDataTrait;
    use RemoveAudioFileTrait;
    use AddAudioToWordTrait;
    use SaveWordListChangesTrait;
    use RemoveOneWordTrait;
    use AddNewLessonTrait;
    use SaveLessonListChangesTrait;
    use SaveOneLessonDataChangesTrait;
    use AddNewLessonPhraseTrait;
    use RemoveOneLessonPhraseTrait;

    
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

            case 'admin/remove-word':
                $result = $this->RemoveOneWord( $request );
                break;
            
            case 'admin/add-new-lesson':
                $result = $this->AddNewLesson( $request );
                break;

            case 'admin/save-one-lesson-changes':
                $result = $this->SaveOneLessonDataChanges( $request );
                break;

            case 'admin/add-new-lesson-phrase':
                $result = $this->AddNewLessonPhrase( $request );
                break;

            case 'admin/remove-one-lesson-phrase':
                $result = $this->RemoveOneLessonPhrase( $request );
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
