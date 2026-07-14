<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait PageDescriptionTrait{ //PageDescription

    private function GetPageDescription( $keyName ){

        $result = '';

        $file = $keyName.'/PageDescription.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetPageDescription(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/PageDescription.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


