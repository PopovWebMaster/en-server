<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Tests;

use App\Http\Controllers\Page\Admin\Traits\GetOneTestDataUseTestModelTrait;

trait GetOneTestDataByTestIdTrait{

    use GetOneTestDataUseTestModelTrait;

    public function GetOneTestDataByTestId( $testId ){

        $result = null;

        $testModel = Tests::where( 'id', '=', $testId )->first();
        if( $testModel === null ){

        }else{
            $result = $this->GetOneTestDataUseTestModel( $testModel );
        };

        return $result;
        
        
    }

}


?>


