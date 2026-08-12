<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;

trait ValidateLessonIdIsActiveTrait{

    public function ValidateLessonIdIsActive( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $lessonId = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'lessonId' ] )? $request[ 'data' ][ 'lessonId' ]: null: null;
        $keyName =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )?  $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $lessonId;

        if( $keyName === null ){
            $result[ 'message' ] = 'keyName=null in ValidateLessonIdIsActive';
        }else{
            if( $lessonId === null ){
                $result[ 'message' ] = 'lessonId=null in ValidateLessonIdIsActive';
            }else{
                $keyName_low = strtolower( $keyName );
                $validate = Validator::make( [ 
                    'lessonId' => $lessonId,
                ], [
                    'lessonId' => [ 'numeric', 'exists:lesson_'.$keyName_low.',id,is_active,1' ],
                ]);
                if( $validate->fails() ){
                    $result[ 'message' ] = $validate->getMessageBag()->all();
                }else{
                    $result[ 'ok' ] = true;

                };
            };
        };

        return $result;
        
        
    }

}


?>


