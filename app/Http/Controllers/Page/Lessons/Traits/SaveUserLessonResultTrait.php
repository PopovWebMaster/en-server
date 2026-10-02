<?php 

namespace App\Http\Controllers\Page\Lessons\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;

use App\Http\Controllers\Traits\GetGuestIdTrait;

use App\Http\Controllers\Traits\SetUserLessonResultTrait;

// use Cookie;

trait SaveUserLessonResultTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use GetGuestIdTrait;
    use SetUserLessonResultTrait;

    public function SaveUserLessonResult( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ] ){
                $keyName =  $validateKeyName[ 'value' ];
                $lessonId = $validateLessonId[ 'value' ];

                $guestId = $this->GetGuestId();

                $userResult = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'userResult' ] )? $request[ 'data' ][ 'userResult' ]: []: [];

                $result[ 'guestId' ] = $guestId;

                $res = $this->SetUserLessonResult([
                    'keyName' =>    $keyName,
                    'lessonId' =>   $lessonId,
                    'guestId' =>    $guestId,
                    'userResult' => $userResult,
                ]);

                $result[ 'res' ] = $res;




                $result[ 'ok' ] = true;
            }else{
                $result[ 'message' ] = $validateLessonId[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


