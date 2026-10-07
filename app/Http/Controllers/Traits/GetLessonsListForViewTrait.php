<?php 

namespace App\Http\Controllers\Traits;

// use Storage;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;
use App\Http\Controllers\Traits\GetGuestIdTrait;
use App\Http\Controllers\Traits\GetOneUserLessonScoreTrait;

trait GetLessonsListForViewTrait{
    use GetLessonsListTrait;
    use GetGuestIdTrait;
    use GetOneUserLessonScoreTrait;

    public function GetLessonsListForView( $keyName ){

        $result = [];

        $list = $this->GetLessonsList( $keyName );
        
        $guestId = $this->GetGuestId();

        
        uasort( $list, function( $a, $b ) {
            if( $a[ 'order' ] > $b[ 'order' ] ){
                return 1;
            }else{
                return -1;
            };
        });

        foreach( $list as $item ){
            $is_active =    $item[ 'is_active' ];
            $id =           $item[ 'id' ];
            $title =        $item[ 'title' ];
            $description =  $item[ 'description' ];
            $level_name =   $item[ 'level_name' ];
            $wordsCount =   $item[ 'wordsCount' ];
            $lessonScore = null;
            // $isPaid =       $item[ 'isPaid' ];
            if( $guestId !== null ){
                $lessonScore = $this->GetOneUserLessonScore( $guestId, $keyName, $id );
            };


            if( $is_active ){
                array_push( $result, [
                    'route' =>                      route( 'one_lessons', [ 'languageAlias' => config( 'languages.languages.'.$keyName.'.alias' ), 'lessonId' => $id ] ),
                    'wordsLength' =>                $wordsCount,
                    'levelName' =>                  $level_name,
                    'lessonName' =>                 $title,
                    'lessonSchortDescription' =>    $description,
                    'lessonScore' =>    $lessonScore,

                ] );
            };
        };


        return $result;
        
        
    }

}


?>


