<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateTestTitleTrait{

    public function ValidateTestTitle( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $testTitle = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'testTitle' ] )? $request[ 'data' ][ 'testTitle' ]: null: null;

        $result[ 'value' ] = $testTitle;

        $validate = Validator::make( [ 
            'testTitle' => $testTitle,
        ], [
            'testTitle' =>   [ 'nullable', 'string', 'max:255' ],
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


