<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait ButtonNameStep_3Trait{ // ButtonNameStep_3

    private function GetButtonNameStep_3(){

        $result = '';

        $file = '/ButtonNameStep_3.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetButtonNameStep_3( $value ){

        $result = '';
        $file = '/ButtonNameStep_3.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


