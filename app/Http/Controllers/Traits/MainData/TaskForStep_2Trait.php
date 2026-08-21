<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait TaskForStep_2Trait{ // TaskForStep_2

    private function GetTaskForStep_2(){

        $result = '';

        $file = '/TaskForStep_2.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTaskForStep_2( $value ){

        $result = '';
        $file = '/TaskForStep_2.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


