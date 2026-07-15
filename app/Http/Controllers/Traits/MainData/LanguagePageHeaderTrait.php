<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LanguagePageHeaderTrait{ //LanguagePageHeader

    private function GetLanguagePageHeader( $keyName ){

        $result = '';

        $file = $keyName.'/LanguagePageHeader.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLanguagePageHeader(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/LanguagePageHeader.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


