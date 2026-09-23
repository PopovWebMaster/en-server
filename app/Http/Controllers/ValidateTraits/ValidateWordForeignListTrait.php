<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

use App\Http\Controllers\Page\Admin\Traits\GetDataOnUniquenessOfForeignWordTrait;

trait ValidateWordForeignListTrait{

    use GetDataOnUniquenessOfForeignWordTrait;

    public function ValidateWordForeignList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
            'isUniq' => false,
        ];

        $wordsForeignList =     isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'wordsForeignList' ] )? $request[ 'data' ][ 'wordsForeignList' ]: null: null;
        $keyName =              isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $wordsForeignList;

        $max = config( 'languages.languages.'.$keyName.'.max' );

        $validate = Validator::make( [ 
            'wordsForeignList' => $wordsForeignList,
        ], [
            'wordsForeignList' =>       [ 'required', 'array' ],
            'wordsForeignList.*' =>     [ 'required', 'string', 'min:1', 'max:'.$max ],

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


