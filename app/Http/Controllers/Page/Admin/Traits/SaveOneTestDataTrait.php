<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateOneTestDataTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneTestDataByTestIdTrait;


use App\Models\Tests;
use App\Models\TestPageDescription;
use App\Models\TestPageKeywords;
use App\Models\TestPageText;
use App\Models\TestPageTitle;



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

                    $testTitle =              $oneTestData[ 'testTitle' ];
                    $testDescription =        $oneTestData[ 'testDescription' ];
                    $testLevelName =          $oneTestData[ 'testLevelName' ];
                    $testIsActive =           $oneTestData[ 'testIsActive' ];
                    $testOrder =              $oneTestData[ 'testOrder' ]; // здесь не используем
                    $testLessons =            $oneTestData[ 'testLessons' ]; // здесь не используем
                    $testPageTitle =          $oneTestData[ 'testPageTitle' ];
                    $testPageDescription =    $oneTestData[ 'testPageDescription' ];
                    $testPageKeywords =       $oneTestData[ 'testPageKeywords' ];
                    $testPageText =           $oneTestData[ 'testPageText' ];

                    $testsModel = Tests::where( 'id', '=', $testId )->first();
                    if( $testsModel === null  ){

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
                        
                    }else{
                        $testsModel->title =        $testTitle;
                        $testsModel->description =  $testDescription;
                        $testsModel->level_name =   $testLevelName;
                        $testsModel->is_active =    $testIsActive;
                        $testsModel->save();

                        $testPageDescriptionModel = TestPageDescription::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                        if( $testPageDescriptionModel === null ){
                            $newTestPageDescription = new TestPageDescription;
                            $newTestPageDescription->test_id = $testId;
                            $newTestPageDescription->key_name = $keyName;
                            $newTestPageDescription->description = $testPageDescription;
                            $newTestPageDescription->save();
                        }else{
                            $testPageDescriptionModel->description = $testPageDescription;
                            $testPageDescriptionModel->save();
                        };

                        $testPageKeywordsModel = TestPageKeywords::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                        if( $testPageKeywordsModel === null ){
                            $newTestPageKeywords = new TestPageKeywords;
                            $newTestPageKeywords->test_id = $testId;
                            $newTestPageKeywords->key_name = $keyName;
                            $newTestPageKeywords->keywords = $testPageKeywords;
                            $newTestPageKeywords->save();
                        }else{
                            $testPageKeywordsModel->keywords = $testPageKeywords;
                            $testPageKeywordsModel->save();
                        };

                        $testPageTextModel = TestPageText::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                        if( $testPageTextModel === null ){
                            $newTestPageText = new TestPageText;
                            $newTestPageText->test_id = $testId;
                            $newTestPageText->key_name = $keyName;
                            $newTestPageText->text = $testPageText;
                            $newTestPageText->save();
                        }else{
                            $testPageTextModel->text = $testPageText;
                            $testPageTextModel->save();
                        };

                        $testPageTitleModel = TestPageTitle::where( 'test_id', '=', $testId )->where( 'key_name', '=', $keyName )->first();
                        if( $testPageTitleModel === null ){
                            $newTestPageTitle = new TestPageTitle;
                            $newTestPageTitle->test_id = $testId;
                            $newTestPageTitle->key_name = $keyName;
                            $newTestPageTitle->title = $testPageTitle;
                            $newTestPageTitle->save();
                        }else{
                            $testPageTitleModel->title = $testPageTitle;
                            $testPageTitleModel->save();
                        };

                    };


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


