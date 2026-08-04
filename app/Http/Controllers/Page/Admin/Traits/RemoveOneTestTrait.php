<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestIdTrait;


use App\Models\Tests;
use App\Models\TestPageDescription;
use App\Models\TestPageKeywords;
use App\Models\TestPageText;
use App\Models\TestPageTitle;
use App\Models\TestLessons;

use App\Http\Controllers\Page\Admin\Traits\GetTestsListTrait;


trait RemoveOneTestTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateTestIdTrait;
    use GetTestsListTrait;

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

                $testsModel = Tests::where( 'id', '=', $testId )->first();
                if( $testsModel !== null ){
                    $testsModel->delete();
                };

                $testLessons = TestLessons::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->get();
                if( count( $testLessons ) > 0 ){
                    $testLessons->map->delete();
                };

                $testPageDescriptionModel = TestPageDescription::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                if( $testPageDescriptionModel !== null ){
                    $testPageDescriptionModel->delete();
                };

                $testPageKeywordsModel = TestPageKeywords::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                if( $testPageKeywordsModel !== null ){
                    $testPageKeywordsModel->delete();
                };

                $testPageTextModel = TestPageText::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                if( $testPageTextModel !== null ){
                    $testPageTextModel->delete();
                };

                $testPageTitleModel = TestPageTitle::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                if( $testPageTitleModel !== null ){
                    $testPageTitleModel->delete();
                };


                $result[ 'testsList' ] = $this->GetTestsList( $keyName );
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


