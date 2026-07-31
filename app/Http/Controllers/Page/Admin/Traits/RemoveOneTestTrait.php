<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestIdTrait;



trait RemoveOneTestTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateTestIdTrait;

    public function RemoveOneTest( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateTestId = $this->ValidateTestId( $request );
            if( $validateTestId[ 'ok' ] ){

                $keyName =      $validateKeyName[ 'value' ];
                $testId =       $validateTestId[ 'value' ];





                $result[ 'ok' ] = true;
            }else{
                $result[ 'message' ] = $validateTestId[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };
        return $result;
        
    }

}


?>


