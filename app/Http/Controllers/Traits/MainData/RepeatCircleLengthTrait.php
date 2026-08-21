<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait RepeatCircleLengthTrait{ // RepeatCircleLength

    private function GetRepeatCircleLength(){

        $result = '';

        $file = '/RepeatCircleLength.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetRepeatCircleLength( $value ){

        $result = '';
        $file = '/RepeatCircleLength.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


