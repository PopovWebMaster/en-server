<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateLessonTitleTrait{

    public function ValidateLessonTitle( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $lessonTitle = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'lessonTitle' ] )? $request[ 'data' ][ 'lessonTitle' ]: null: null;

        $result[ 'value' ] = $lessonTitle;

        $validate = Validator::make( [ 
            'lessonTitle' => $lessonTitle,
        ], [
            'lessonTitle' =>   [ 'nullable', 'string', 'max:255' ],
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


