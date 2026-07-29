<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LessonsListPageHeaderTrait{ //LessonsListPageHeader

    private function GetLessonsListPageHeader(){

        $result = '';

        $file = '/LessonsListPageHeader.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLessonsListPageHeader( $value ){

        $result = '';
        $file = '/LessonsListPageHeader.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


