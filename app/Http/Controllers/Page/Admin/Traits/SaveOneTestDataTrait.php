<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateOneTestDataTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneTestDataByTestIdTrait;



trait SaveOneTestDataTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateOneTestDataTrait;
    use ValidateTestIdTrait;
    use GetOneTestDataByTestIdTrait;

    public function SaveOneTestData( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateTestId = $this->ValidateTestId( $request );
            if( $validateTestId[ 'ok' ] ){
                $validateOneTestData = $this->ValidateOneTestData( $request );
                if( $validateOneTestData[ 'ok' ] ){

                    $keyName =      $validateKeyName[ 'value' ];
                    $testId =       $validateTestId[ 'value' ];
                    $oneTestData =  $validateOneTestData[ 'value' ];





                    $result[ 'oneTestData' ] = $this->GetOneTestDataByTestId( $testId );
                    $result[ 'ok' ] = true;
                }else{
                    $result[ 'message' ] = $validateOneTestData[ 'message' ];
                };
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


