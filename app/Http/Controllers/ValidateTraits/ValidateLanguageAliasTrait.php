<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
use Illuminate\Validation\Rule;

trait ValidateLanguageAliasTrait{

    public function ValidateLanguageAlias( $languageAlias ){

        $result = [
            'ok' => false,
            'message' => '',
            'keyName' => null,
        ];

        $value = isset( $languageAlias )? $languageAlias: null;

        $languages = config( 'languages.languages' );
        $ruleArr = [];
        $aliasKeyNameArr = [];
        foreach( $languages as $keyName => $item ){
            array_push( $ruleArr, $item[ 'alias' ] );
            $aliasKeyNameArr[ $item[ 'alias' ] ] = $keyName;
        };

        $validate = Validator::make( [ 
            'value' => $value,
        ], [
            'value' => [ 'required', Rule::in( $ruleArr ), 'string' ],
        ]);

        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            $result[ 'ok' ] = true;
            if( isset( $aliasKeyNameArr[ $value ] ) ){
                $result[ 'keyName' ] = $aliasKeyNameArr[ $value ];
            };
        };



        return $result;
        
        
    }

}


?>


