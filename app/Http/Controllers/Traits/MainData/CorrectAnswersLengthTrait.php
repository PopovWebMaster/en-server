<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait CorrectAnswersLengthTrait{ // CorrectAnswersLength

    private function GetCorrectAnswersLength(){

        $result = '';

        $file = '/CorrectAnswersLength.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetCorrectAnswersLength( $value ){

        $result = '';
        $file = '/CorrectAnswersLength.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


