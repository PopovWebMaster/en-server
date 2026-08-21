<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait ButtonNameStep_1Trait{ // ButtonNameStep_1

    private function GetButtonNameStep_1(){

        $result = '';

        $file = '/ButtonNameStep_1.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetButtonNameStep_1( $value ){

        $result = '';
        $file = '/ButtonNameStep_1.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


