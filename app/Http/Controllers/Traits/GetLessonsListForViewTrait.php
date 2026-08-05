<?php 

namespace App\Http\Controllers\Traits;

// use Storage;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;

trait GetLessonsListForViewTrait{
    use GetLessonsListTrait;

    public function GetLessonsListForView( $keyName ){

        $result = [];

        $list = $this->GetLessonsList( $keyName );
        
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
            // $isPaid =       $item[ 'isPaid' ];
            if( $is_active ){
                array_push( $result, [
                    'route' =>                      route( 'one_lessons', [ 'languageAlias' => config( 'languages.languages.'.$keyName.'.alias' ), 'lessonId' => $id ] ),
                    'wordsLength' =>                $wordsCount,
                    'levelName' =>                  $level_name,
                    'lessonName' =>                 $title,
                    'lessonSchortDescription' =>    $description,
                ] );
            };
        };


        return $result;
        
        
    }

}


?>


