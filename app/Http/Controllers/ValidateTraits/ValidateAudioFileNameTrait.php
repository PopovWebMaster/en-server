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

        $result[ 'value' ] = $audioFileName;

        $max = config( 'languages.languages.EN.max' );
        $regex = config( 'languages.languages.EN.regex' );
 
        $validate = Validator::make( [ 
            'audioFileName' => $audioFileName,
        ], [
            'audioFileName' => [ 'required', 'regex:'.$regex, 'string', 'min:5', 'max:'.$max ],
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


