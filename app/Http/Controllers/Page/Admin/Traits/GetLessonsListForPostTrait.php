<?php 

namespace App\Http\Controllers\Page\Admin\Traits;


use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;

use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;

trait GetLessonsListForPostTrait{

    use ValidateLanguageKeyNameTrait;
    use GetLessonsListTrait;


    public function GetLessonsListForPost( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );

        if( $validateKeyName[ 'ok' ] ){

            $keyName = $validateKeyName[ 'value' ];

            if( $keyName === 'EN' ){

                $result[ 'lessonList' ] = $this->GetLessonsList( $keyName );
                $result[ 'ok' ] = true;



            };

           
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

       
        

        return $result;
        
        
    }

}


?>


