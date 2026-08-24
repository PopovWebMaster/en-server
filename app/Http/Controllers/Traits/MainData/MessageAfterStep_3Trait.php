<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait MessageAfterStep_3Trait{ // MessageAfterStep_3

    private function GetMessageAfterStep_3(){

        $result = '';

        $file = '/MessageAfterStep_3.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetMessageAfterStep_3( $value ){

        $result = '';
        $file = '/MessageAfterStep_3.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


