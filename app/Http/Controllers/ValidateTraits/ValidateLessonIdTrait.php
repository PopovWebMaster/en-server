<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;

trait ValidateLessonIdTrait{

    public function ValidateLessonId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $lessonId = isset( $request[ 'data' ][ 'lessonId' ] )? isset( $request[ 'data' ][ 'lessonId' ] )? $request[ 'data' ][ 'lessonId' ]: null: null;
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $lessonId;

        $rule = [];
        if( $lessonId === null ){
            $rule = [ 'nullable', 'numeric', ];
        }else{
            $keyName_low = strtolower( $keyName );
            $rule = [ 'numeric', 'exists:lesson_'.$keyName_low.',id' ];
        };

        $validate = Validator::make( [ 
            'lessonId' => $lessonId,
        ], [
            // 'lessonId' => [ 'nullable', 'numeric', /* 'exists:application,id'*/ ],
            'lessonId' => $rule,

        ]);


        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            $result[ 'ok' ] = true;

        };

        
        return $result;
        
        
    }

}


?>


