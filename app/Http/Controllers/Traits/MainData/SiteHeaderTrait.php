<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait SiteHeaderTrait{ // SiteHeader

    private function GetSiteHeader(){

        $result = '';

        $file = '/SiteHeader.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetSiteHeader( $value ){

        $result = '';
        $file = '/SiteHeader.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


