<?php 

namespace App\Http\Controllers\ValidateTraits;

// use Storage;

use Validator;
use Illuminate\Validation\Rule;


trait ValidateLanguageKeyNameTrait{

    public function ValidateLanguageKeyName( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $kayName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'kayName' ] )? $request[ 'data' ][ 'kayName' ]: null: null;
        $result[ 'value' ] = $kayName;

        $arr = array_keys( config( 'languages.languages' ) );

        $validate = Validator::make( [ 
            'kayName' => $kayName,
        ], [
            'kayName' => [ 'required', Rule::in( $arr ), 'string', 'min:2', 'max:2' ],
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


