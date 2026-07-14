<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait SiteKeywordsTrait{ // SiteKeywords

    private function GetSiteKeywords(){

        $result = '';

        $file = '/SiteKeywords.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetSiteKeywords( $value ){

        $result = '';
        $file = '/SiteKeywords.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


