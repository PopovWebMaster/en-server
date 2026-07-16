<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;


trait ValidateWordIdTrait{

    public function ValidateWordId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $foreignWordId = isset( $request[ 'data' ][ 'foreignWordId' ] )? isset( $request[ 'data' ][ 'foreignWordId' ] )? $request[ 'data' ][ 'foreignWordId' ]: null: null;

        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;


        $result[ 'value' ] = $foreignWordId;

        $keyName_low = strtolower( $keyName );
        $exists_words = 'exists:word_'.$keyName_low.',id';


        $validate = Validator::make( [ 
            'foreignWordId' => $foreignWordId,
        ], [
            // 'foreignWordId' => [ 'required', 'numeric', 'exists:word_en,id' ],
            'foreignWordId' => [ 'required', 'numeric', $exists_words ],

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


