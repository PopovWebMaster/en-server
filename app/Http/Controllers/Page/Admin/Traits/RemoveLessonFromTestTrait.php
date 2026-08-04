<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonsIdListTrait;

use App\Http\Controllers\Page\Admin\Traits\GetOneTestDataByTestIdTrait;

use App\Models\TestLessons;


trait RemoveLessonFromTestTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateTestIdTrait;
    use ValidateLessonsIdListTrait;

    use GetOneTestDataByTestIdTrait;

    public function RemoveLessonFromTest( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateTestId = $this->ValidateTestId( $request );
            if( $validateTestId[ 'ok' ] ){
                $validateLessonsIdList = $this->ValidateLessonsIdList( $request );
                if( $validateLessonsIdList[ 'ok' ] ){

                    $keyName =          $validateKeyName[ 'value' ];
                    $testId =           $validateTestId[ 'value' ];
                    $lessonsIdList =    $validateLessonsIdList[ 'value' ];

                    for( $i = 0; $i < count( $lessonsIdList ); $i++ ){
                        $lessonId = $lessonsIdList[ $i ];
                        $model = TestLessons::where( 'test_id', '=', $testId )
                                            ->where( 'key_name', '=', $keyName )
                                            ->where( 'lesson_id', '=', $lessonId )
                                            ->first();
                        if( $model !== null ){
                            $model->delete();
                        };

                    };


                    $result[ 'oneTestData' ] = $this->GetOneTestDataByTestId( $testId );
                    $result[ 'ok' ] = true;

                }else{
                    $result[ 'message' ] = $validateLessonsIdList[ 'message' ];
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


