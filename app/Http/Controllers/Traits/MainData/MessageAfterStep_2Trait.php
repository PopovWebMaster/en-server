<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait MessageAfterStep_2Trait{ // MessageAfterStep_2

    private function GetMessageAfterStep_2(){

        $result = '';

        $file = '/MessageAfterStep_2.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetMessageAfterStep_2( $value ){

        $result = '';
        $file = '/MessageAfterStep_2.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


