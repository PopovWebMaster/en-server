<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\WordEn;
use App\Models\AudioEn;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneLessonDataTrait;
use App\Http\Controllers\Page\Admin\Traits\GetMainPageDataTrait;
use App\Http\Controllers\Page\Admin\Traits\GetTestsListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetOneTestDataByTestIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetAppDataTrait;






trait GetStartingDataTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use ValidateTestIdTrait;
    use GetWordListTrait;
    use GetLessonsListTrait;
    use GetOneLessonDataTrait;
    use GetMainPageDataTrait;
    use GetTestsListTrait;
    use GetOneTestDataByTestIdTrait;
    use GetAppDataTrait;

    public function GetStartingData( $request, $user ){
        /*
            wordList
            lessonList
            oneLessonData
            mainPage
            testsList,
            oneTestData,
            appData,
        */

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $what_to_take = isset( $request[ 'data' ][ 'what_to_take' ] )? $request[ 'data' ][ 'what_to_take' ]: [];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ]){
                $validateTestId = $this->ValidateTestId( $request );
                if( $validateTestId[ 'ok' ] ){

                    $keyName = $validateKeyName[ 'value' ];
                    $lessonId = $validateLessonId[ 'value' ];
                    $testId =   $validateTestId[ 'value' ];

                    for( $i = 0; $i < count( $what_to_take ); $i++ ){

                        $item = $what_to_take[ $i ];

                        switch( $item ){
                            case 'wordList':
                                $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId );
                                break;

                            case 'lessonList':
                                $result[ 'lessonList' ] = $this->GetLessonsList( $keyName );
                                break;

                            case 'oneLessonData':
                                $result[ 'oneLessonData' ] = $this->GetOneLessonData( $keyName, $lessonId );
                                break;
                            case 'mainPage':
                                $result[ 'mainPage' ] = $this->GetMainPageData( $keyName );
                                break;

                            case 'testsList':
                                $result[ 'testsList' ] = $this->GetTestsList( $keyName );
                                break;

                            case 'oneTestData':
                                $result[ 'oneTestData' ] = $this->GetOneTestDataByTestId( $testId );
                                break;

                            case 'appData':
                                $result[ 'appData' ] = $this->GetAppData( $keyName );
                                break;

                                

                                
                        };

                    };

                    $result[ 'ok' ] = true;

                }else{
                    $result[ 'message' ] = $validateTestId[ 'message' ];
                };

                
            }else{
                $result[ 'message' ] = $validateLessonId[ 'message' ];
            };
            
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


