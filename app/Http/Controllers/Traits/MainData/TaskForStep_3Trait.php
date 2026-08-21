<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait TaskForStep_3Trait{ // TaskForStep_3

    private function GetTaskForStep_3(){

        $result = '';

        $file = '/TaskForStep_3.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTaskForStep_3( $value ){

        $result = '';
        $file = '/TaskForStep_3.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


