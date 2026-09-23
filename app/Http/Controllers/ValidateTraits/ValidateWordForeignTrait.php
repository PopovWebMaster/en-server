<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

use App\Http\Controllers\Page\Admin\Traits\GetDataOnUniquenessOfForeignWordTrait;

trait ValidateWordForeignTrait{

    use GetDataOnUniquenessOfForeignWordTrait;

    public function ValidateWordForeign( $request, $uniq = false ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
            'isUniq' => false,
        ];

        $wordForeign =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'word_foreign' ] )? $request[ 'data' ][ 'word_foreign' ]: null: null;
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $wordForeign;

        $max = config( 'languages.languages.'.$keyName.'.max' );

        $validate = Validator::make( [ 
            'wordForeign' => $wordForeign,
        ], [
            'wordForeign' => [ 'required', 'string', 'min:1', 'max:'.$max ],

        ]);

        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            if( $uniq === true ){

                $uniqData = $this->GetDataOnUniquenessOfForeignWord([
                    'wordForeign' =>    $wordForeign,
                    'keyName' =>        $keyName,
                ]);

                $result[ 'isUniq' ] =   $uniqData[ 'isUniq' ];
                $result[ 'message' ] =  $uniqData[ 'message' ];

            };

            $result[ 'ok' ] = true;

        };

        
        return $result;
        
        
    }

}


?>


