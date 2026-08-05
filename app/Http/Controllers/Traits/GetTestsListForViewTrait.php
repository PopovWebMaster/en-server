<?php 

namespace App\Http\Controllers\Traits;

// use Storage;
use App\Http\Controllers\Page\Admin\Traits\GetLessonsListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetTestsListTrait;

trait GetTestsListForViewTrait{
    use GetLessonsListTrait;
    use GetTestsListTrait;

    public function GetTestsListForView( $keyName ){

        $result = [];

        $list = $this->GetTestsList( $keyName );
        
        uasort( $list, function( $a, $b ) {
            if( $a[ 'order' ] > $b[ 'order' ] ){
                return 1;
            }else{
                return -1;
            };
        });

        foreach( $list as $item ){
            $is_active =    $item[ 'isActive' ];
            $id =           $item[ 'id' ];
            $title =        $item[ 'title' ];
            $description =  $item[ 'description' ];
            $level_name =   $item[ 'levelName' ];
            $wordsCount =   $item[ 'wordsCount' ];


            // $isPaid =       $item[ 'isPaid' ];
            if( $is_active ){
                array_push( $result, [
                    'route' =>                      route( 'one_test', [ 'languageAlias' => config( 'languages.languages.'.$keyName.'.alias' ), 'testId' => $id ] ),
                    'wordsLength' =>                $wordsCount,
                    'levelName' =>                  $level_name,
                    'testName' =>                 $title,
                    'testSchortDescription' =>    $description,
                ] );
            };
        };


        return $result;
        
        
    }

}


?>


