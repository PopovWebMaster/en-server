<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

// use Storage;

use App\Models\WordEn;

use Validator;


trait CheckWordEnForUniqTrait{

    public function CheckWordEnForUniq( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'isUniq' => false,
        ];

        $word_en = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'word_en' ] )? $request[ 'data' ][ 'word_en' ]: null: null;

        $validate = Validator::make( [ 
            'wordEn' => $word_en,
        ], [
            'wordEn' => [ 'required', 'regex:/^[a-zA-Z,.\'!?:;()\-\s]+$/', 'string', 'min:1', 'max:80' ],
        ]);

        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            $result[ 'ok' ] = true;

            $wordEn = WordEn::where( 'en', '=', $word_en )->first();
            if( $wordEn === null ){
                $result[ 'isUniq' ] = true;
            };
        };


        return $result;
        
        
    }

}


?>


