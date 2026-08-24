<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait MessageAfterStep_1Trait{ // MessageAfterStep_1

    private function GetMessageAfterStep_1(){

        $result = '';

        $file = '/MessageAfterStep_1.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetMessageAfterStep_1( $value ){

        $result = '';
        $file = '/MessageAfterStep_1.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


