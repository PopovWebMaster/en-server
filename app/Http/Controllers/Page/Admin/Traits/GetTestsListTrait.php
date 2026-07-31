<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Tests;
// use App\Models\TestLessons;
// use App\Models\TestPageTitle;
// use App\Models\TestPageDescription;
// use App\Models\TestPageKeywords;
// use App\Models\TestPageText;


// use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;
// use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneTestDataUseTestModelTrait;

trait GetTestsListTrait{

    // use GetLessonModelByIdTrait;
    // use GetWordListTrait;
    use GetOneTestDataUseTestModelTrait;

    public function GetTestsList( $keyName ){

        $result = [];

        $testCollection = Tests::where( 'key_name', '=', $keyName )->get();

        foreach( $testCollection as $testModel ){
            array_push( $result, $this->GetOneTestDataUseTestModel( $testModel ) );
        };

        return $result;
        
        
    }

}


?>


