<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateAudioFilesArrTrait{

    public function ValidateAudioFilesArr( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $files = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'files' ] )? $request[ 'data' ][ 'files' ]: null: null;

        $result[ 'value' ] = $files;


        $validate = Validator::make( [ 
            'files' => $files,
        ], [
            'files' => [ 'nullable', 'array' ],
            'files.*.name' =>       [ 'required', 'string', 'min:3', 'max:80' ],
            'files.*.base64' =>     [ 'required', 'string' ],
        ]);

        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            
            if( is_array( $files ) ){
                $result[ 'ok' ] = true;
            }else{
                $result[ 'message' ] = 'files не массив';
            };

        };

        
        return $result;
        
        
    }

}


?>


