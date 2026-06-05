<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

// use App\Models\WordEn;

trait ValidateWordEnIdTrait{

    public function ValidateWordEnId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $foreignWordId = isset( $request[ 'data' ][ 'foreignWordId' ] )? isset( $request[ 'data' ][ 'foreignWordId' ] )? $request[ 'data' ][ 'foreignWordId' ]: null: null;

        $result[ 'value' ] = $foreignWordId;

        $validate = Validator::make( [ 
            'foreignWordId' => $foreignWordId,
        ], [
            'foreignWordId' => [ 'required', 'numeric', 'exists:word_en,id' ],
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


