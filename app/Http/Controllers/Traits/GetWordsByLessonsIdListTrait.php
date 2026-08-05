<?php 

namespace App\Http\Controllers\Traits;

// use App\Models\Tests;
// use App\Models\TestPageTitle;
// use App\Models\TestPageText;
// use App\Models\TestPageKeywords;
// use App\Models\TestPageDescription;
// use App\Models\TestLessons;

use App\Http\Controllers\Traits\GetWordsByLessonIdTrait;


trait GetWordsByLessonsIdListTrait{

    use GetWordsByLessonIdTrait;

    public function GetWordsByLessonsIdList( $keyName, $lessonsIdList ){

        $result = [];

        for( $i = 0; $i < count( $lessonsIdList ); $i++ ){
            $lessonId = $lessonsIdList[ $i ];
            $words = $this->GetWordsByLessonId( $keyName, $lessonId );
            for( $y = 0; $y < count( $words ); $y++ ){
                array_push( $result, $words[ $y ] );
            };
        };

        return $result;
        
        
    }

}


?>


