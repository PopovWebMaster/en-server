<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait SiteTitleTrait{ // SiteTitle

    private function GetSiteTitle(){

        $result = '';

        $file = '/SiteTitle.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetSiteTitle( $value ){

        $result = '';
        $file = '/SiteTitle.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


