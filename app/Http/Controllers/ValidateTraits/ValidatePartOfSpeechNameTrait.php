<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidatePartOfSpeechNameTrait{

    public function ValidatePartOfSpeechName( $request, $mustByUnique = false ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $partOfSpeechName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'partOfSpeechName' ] )? $request[ 'data' ][ 'partOfSpeechName' ]: null: null;

        $result[ 'value' ] = $partOfSpeechName;

        $rule = [ 'required', 'string', 'min:1', 'max:40' ];
        if( $mustByUnique === true ){
            array_push( $rule, 'unique:part_of_speech,name' );
        };

        $validate = Validator::make( [ 
            'partOfSpeechName' => $partOfSpeechName,
        ], [
            'partOfSpeechName' => $rule,
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


