<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait TaskForStep_1Trait{ // TaskForStep_1

    private function GetTaskForStep_1(){

        $result = '';

        $file = '/TaskForStep_1.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTaskForStep_1( $value ){

        $result = '';
        $file = '/TaskForStep_1.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


