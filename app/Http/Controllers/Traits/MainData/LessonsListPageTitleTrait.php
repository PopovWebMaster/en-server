<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LessonsListPageTitleTrait{ //LessonsListPageTitle

    private function GetLessonsListPageTitle(){

        $result = '';

        $file = '/LessonsListPageTitle.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLessonsListPageTitle(  $value ){

        $result = '';
        $file = '/LessonsListPageTitle.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


