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

        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;
        $result[ 'value' ] = $keyName;

        

        if( $keyName === 'EN' ){
            $arr = array_keys( config( 'languages.languages' ) );

            $validate = Validator::make( [ 
                'keyName' => $keyName,
            ], [
                'keyName' => [ 'required', Rule::in( $arr ), 'string', 'min:2', 'max:2' ],
            ]);

            if( $validate->fails() ){
                $result[ 'message' ] = $validate->getMessageBag()->all();
            }else{
                $result[ 'ok' ] = true;
            };

        }else{
            $result[ 'message' ] = 'язык не прописан '.$keyName;
        };

        return $result;
        
        
    }

}


?>


