<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateWordEnTrait{

    public function ValidateWordEn( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $wordEn = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'word_foreign' ] )? $request[ 'data' ][ 'word_foreign' ]: null: null;

        $result[ 'value' ] = $wordEn;

        $max = config( 'languages.languages.EN.max' );
        $regex = config( 'languages.languages.EN.regex' );

        $validate = Validator::make( [ 
            'wordEn' => $wordEn,
        ], [
            'wordEn' => [ 'required', 'regex:'.$regex, 'string', 'min:1', 'max:'.$max ],
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


