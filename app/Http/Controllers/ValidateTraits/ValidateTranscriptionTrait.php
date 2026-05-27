<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateTranscriptionTrait{

    public function ValidateTranscription( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $transcription = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'transcription' ] )? $request[ 'data' ][ 'transcription' ]: null: null;

        $result[ 'value' ] = $transcription;

        $max = 80;
        // $regex = '/^[А-Яа-яёЁ0-9.,:;?\-!\s]+$/u';


        $validate = Validator::make( [ 
            'transcription' => $transcription,
        ], [
            // 'transcription' => [ 'nullable', 'regex:'.$regex, 'string', 'min:1', 'max:'.$max ],
            'transcription' => [ 'nullable', 'string', 'min:1', 'max:'.$max ],


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


