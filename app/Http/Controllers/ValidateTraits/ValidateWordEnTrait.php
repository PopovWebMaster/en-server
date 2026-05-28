<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

use App\Models\WordEn;

trait ValidateWordEnTrait{

    public function ValidateWordEn( $request, $uniq = false ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $wordEn = isset( $request[ 'data' ][ 'word_foreign' ] )? isset( $request[ 'data' ][ 'word_foreign' ] )? $request[ 'data' ][ 'word_foreign' ]: null: null;

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
            if( $uniq === true ){
                $wordEnModel = WordEn::where( 'en', '=', $wordEn )->first();
                if( $wordEnModel === null ){
                    $result[ 'ok' ] = true;
                }else{
                    $result[ 'message' ] = "Это слово уже существует - ".$wordEn;
                };

            }else{
                $result[ 'ok' ] = true;
            };

        };

        
        return $result;
        
        
    }

}


?>


