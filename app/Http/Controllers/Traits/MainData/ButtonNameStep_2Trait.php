<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait ButtonNameStep_2Trait{ // ButtonNameStep_2

    private function GetButtonNameStep_2(){

        $result = '';

        $file = '/ButtonNameStep_2.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetButtonNameStep_2( $value ){

        $result = '';
        $file = '/ButtonNameStep_2.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


