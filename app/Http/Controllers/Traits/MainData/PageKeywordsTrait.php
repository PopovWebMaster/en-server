<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait PageKeywordsTrait{ //PageKeywords

    private function GetPageKeywords( $keyName ){

        $result = '';

        $file = $keyName.'/PageKeywords.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetPageKeywords(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/PageKeywords.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


