<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait PageTitleTrait{ //PageTitle

    private function GetPageTitle( $keyName ){

        $result = '';

        $file = $keyName.'/PageTitle.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetPageTitle(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/PageTitle.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


