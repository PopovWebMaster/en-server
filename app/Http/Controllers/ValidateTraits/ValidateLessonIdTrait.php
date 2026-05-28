<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

// use App\Models\WordEn;

trait ValidateLessonIdTrait{

    public function ValidateLessonId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $lessonId = isset( $request[ 'data' ][ 'lessonId' ] )? isset( $request[ 'data' ][ 'lessonId' ] )? $request[ 'data' ][ 'lessonId' ]: null: null;
        $kayName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'kayName' ] )? $request[ 'data' ][ 'kayName' ]: null: null;

        $result[ 'value' ] = $lessonId;

        $validate = Validator::make( [ 
            'lessonId' => $lessonId,
        ], [
            'lessonId' => [ 'nullable', 'numeric', /* 'exists:application,id'*/ ],
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


