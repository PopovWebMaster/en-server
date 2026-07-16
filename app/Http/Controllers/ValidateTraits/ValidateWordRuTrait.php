<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateWordRuTrait{

    public function ValidateWordRu( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $wordRu = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'word_ru' ] )? $request[ 'data' ][ 'word_ru' ]: null: null;

        $result[ 'value' ] = $wordRu;

        // $max = 80;
        // $regex = '/^[А-Яа-яёЁ0-9.,:;?\-!\s]+$/u';

        $max = config( 'languages.languages.RU.max' );
        // $regex = config( 'languages.languages.RU.regex' );




        $validate = Validator::make( [ 
            'wordRu' => $wordRu,
        ], [
            // 'wordRu' => [ 'nullable', 'regex:'.$regex, 'string', 'min:1', 'max:'.$max ],
            'wordRu' => [ 'nullable', 'string', 'min:1', 'max:'.$max ],


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


