<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Tests;


use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestsListTrait;

use App\Http\Controllers\Page\Admin\Traits\GetTestsListTrait;

trait SaveTestsChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateTestsListTrait;
    use GetTestsListTrait;

    public function SaveTestsChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateTestsList = $this->ValidateTestsList( $request );
            if( $validateKeyName[ 'ok' ] ){
                $keyName =      $validateKeyName[ 'value' ];
                $testsList =    $validateTestsList[ 'value' ];

                for( $i = 0; $i < count( $testsList ); $i++ ){
                    $testId =   $testsList[ $i ][ 'id' ];
                    $order =    $testsList[ $i ][ 'order' ];
                    $isActive = $testsList[ $i ][ 'isActive' ];

                    $testsModel = Tests::where( 'id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                    if( $testsModel !== null ){
                        $testsModel->order = $order;
                        $testsModel->is_active = $isActive;
                        $testsModel->save();
                    };
                };



                $result[ 'testsList' ] = $this->GetTestsList( $keyName );
                $result[ 'ok' ] = true;
                $result[ 'message' ] = 'ono';


            }else{
                $result[ 'message' ] = $validateKeyName[ 'message' ];
            }; 
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


