<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateTestIdTrait;

use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;

use App\Models\TestLessons;


trait GetAllLessonsListForTestTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateTestIdTrait;
    use GetLessonsListTrait;

    public function GetAllLessonsListForTest( $request ){

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

                

                $lessons = $this->GetLessonsList( $keyName );

                $lessonsForTest = [];
                for( $i = 0; $i < count( $lessons ); $i++ ){
                    $lessonId = $lessons[ $i ];

                    $item = $lessons[ $i ];
                    $item[ 'testId' ] = null;
                    $testLessons = TestLessons::where( 'lesson_id', '=', $lessonId )->where( 'key_name', '=', $testId )->first();

                    if( $testLessons !== null ){
                        $item[ 'testId' ] = $testLessons->test_id;
                    };

                    array_push( $lessonsForTest, $item );

                };

                $result[ 'lessonsForTest' ] = $lessonsForTest;


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


