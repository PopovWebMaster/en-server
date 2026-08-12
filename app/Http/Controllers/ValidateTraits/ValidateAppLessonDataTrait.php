<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdIsActiveTrait;


trait ValidateAppLessonDataTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdIsActiveTrait;

    public function ValidateAppLessonData( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => [],
        ];

        $validateLanguageKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateLanguageKeyName[ 'ok' ] ){

            $validateLessonIdIsActive = $this->ValidateLessonIdIsActive( $request );
            if( $validateLessonIdIsActive[ 'ok' ] ){
                $result[ 'value' ][ 'keyName' ] = $validateLanguageKeyName[ 'value' ];
                $result[ 'value' ][ 'lessonId' ] = $validateLessonIdIsActive[ 'value' ];



                $result[ 'ok' ] = true;
            }else{
                $result = $validateLessonIdIsActive;
            };
        }else{
            $result = $validateLanguageKeyName;
        };



        
        return $result;
        
        
    }

}


?>


