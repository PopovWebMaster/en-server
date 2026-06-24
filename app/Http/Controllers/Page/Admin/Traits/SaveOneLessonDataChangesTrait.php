<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\LessonEn;


use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
// use App\Http\Controllers\ValidateTraits\ValidateLessonListTrait;
// use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;

use App\Http\Controllers\ValidateTraits\ValidateOneLessonDataTrait;

trait SaveOneLessonDataChangesTrait{

    use ValidateLanguageKeyNameTrait;
    // use ValidateLessonListTrait;
    // use GetLessonsListTrait;

    use ValidateOneLessonDataTrait;

    public function SaveOneLessonDataChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        

    
        if( $validateKeyName[ 'ok' ] ){
            $keyName =          $validateKeyName[ 'value' ];
            $validateOneLessonData = $this->ValidateOneLessonData( $request );
            if( $validateOneLessonData[ 'ok' ] ){


                $result[ 'message' ] = 'ghjdthrj ghjqltyjk';

            }else{
                $result[ 'message' ] = $validateOneLessonData[ 'message' ];
            };


            
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


