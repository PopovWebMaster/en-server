<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait SiteNameTrait{

    private function GetSiteName( $keyName = 'EN' ){

        $result = '';

        $file = '/SiteName.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetSiteName( $keyName = 'EN', $value ){

        $result = '';
        $file = '/SiteName.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


