<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LessonsListPageKeywordsTrait{ //LessonsListPageKeywords

    private function GetLessonsListPageKeywords(){

        $result = '';

        $file = '/LessonsListPageKeywords.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLessonsListPageKeywords( $value ){

        $result = '';
        $file = '/LessonsListPageKeywords.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


