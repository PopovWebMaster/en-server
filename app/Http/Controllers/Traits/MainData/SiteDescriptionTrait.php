<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait SiteDescriptionTrait{ //SiteDescription

    private function GetSiteDescription(){

        $result = '';

        $file = '/SiteDescription.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetSiteDescription( $value ){

        $result = '';
        $file = '/SiteDescription.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


