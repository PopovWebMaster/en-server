<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;

trait ValidateTestIdTrait{

    public function ValidateTestId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $testId = isset( $request[ 'data' ][ 'testId' ] )? isset( $request[ 'data' ][ 'testId' ] )? $request[ 'data' ][ 'testId' ]: null: null;

        $result[ 'value' ] = $testId;

        $rule = [];
        if( $testId === null ){
            $rule = [ 'nullable', 'numeric', ];
        }else{
            $rule = [ 'numeric', 'exists:tests,id' ];
        };

        $validate = Validator::make( [ 
            'testId' => $testId,
        ], [
            'testId' => $rule,
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


