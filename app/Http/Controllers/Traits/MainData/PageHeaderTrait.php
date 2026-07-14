<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait PageHeaderTrait{ //PageHeader

    private function GetPageHeader( $keyName ){

        $result = '';

        $file = $keyName.'/PageHeader.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetPageHeader(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/PageHeader.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


