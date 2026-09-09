<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidatePartOfSpeechIdTrait{

    public function ValidatePartOfSpeechId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $partOfSpeechId = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'partOfSpeechId' ] )? $request[ 'data' ][ 'partOfSpeechId' ]: null: null;

        $result[ 'value' ] = $partOfSpeechId;

        $validate = Validator::make( [ 
            'partOfSpeechId' => $partOfSpeechId,
        ], [
            'partOfSpeechId' => [ 'required', 'numeric', 'exists:part_of_speech,id' ],
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


