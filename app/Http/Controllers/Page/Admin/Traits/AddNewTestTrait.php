<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;

use App\Http\Controllers\ValidateTraits\ValidateTestTitleTrait; 

use App\Models\Tests;

use App\Http\Controllers\Page\Admin\Traits\GetTestsListTrait;

trait AddNewTestTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateTestTitleTrait;
    // use GetLessonsListTrait;
    use GetTestsListTrait;

    public function AddNewTest( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validadeKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validadeKeyName[ 'ok' ] ){
            $validateTestTitle= $this->ValidateTestTitle( $request );
            if( $validateTestTitle[ 'ok' ] ){
                $keyName = $validadeKeyName[ 'value' ];
                $testTitle = $validateTestTitle[ 'value' ];

                $testCollection = Tests::where( 'key_name', '=', $keyName )->get();
                $order = count( $testCollection ) + 1;

                $testModel = new Tests;
                $testModel->title =     $testTitle;
                $testModel->key_name =  $keyName;
                $testModel->order =     $order;

                $testModel->save();

                $result[ 'ok' ] = true;
                $result[ 'testsList' ] = $this->GetTestsList( $keyName );

            }else{
                $result[ 'message' ] = $validateTestTitle[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };


        return $result;
        
        
    }

}


?>


