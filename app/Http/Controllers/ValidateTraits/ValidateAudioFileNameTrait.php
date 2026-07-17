<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;


trait ValidateAudioFileNameTrait{

    public function ValidateAudioFileName( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $audioFileName = isset( $request[ 'data' ][ 'audioFileName' ] )? isset( $request[ 'data' ][ 'audioFileName' ] )? $request[ 'data' ][ 'audioFileName' ]: null: null;
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $audioFileName;

        $max = config( 'languages.languages.'.$keyName.'.max' );
 
        $validate = Validator::make( [ 
            'audioFileName' => $audioFileName,
        ], [
            'audioFileName' => [ 'required', 'string', 'min:5', 'max:'.$max ],
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


