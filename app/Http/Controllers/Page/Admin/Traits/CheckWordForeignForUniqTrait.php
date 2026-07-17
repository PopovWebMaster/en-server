<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordForeignTrait;

use Validator;


trait CheckWordForeignForUniqTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateWordForeignTrait;

    public function CheckWordForeignForUniq( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'isUniq' => false,
        ];

        $validadeKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validadeKeyName[ 'ok' ] ){
            $validateWordForeign = $this->ValidateWordForeign( $request, true );
            if( $validateWordForeign[ 'ok' ] ){
                $kayName =      $validadeKeyName[ 'value' ];
                $wordForeign =  $validateWordForeign[ 'value' ];

                $result[ 'ok' ] = true;
                $result[ 'isUniq' ] = true;

            }else{
                $result[ 'message' ] = $validateWordForeign[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

        return $result;
        
    }

}


?>


