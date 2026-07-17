<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;


trait GetFreeWordsListTrait{

    use ValidateLanguageKeyNameTrait;
    use GetWordListTrait;

    public function GetFreeWordsList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){

            $keyName = $validateKeyName[ 'value' ];

            $result[ 'wordList' ] = $this->GetWordList( $keyName, null );
            $result[ 'ok' ] = true;
                
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


