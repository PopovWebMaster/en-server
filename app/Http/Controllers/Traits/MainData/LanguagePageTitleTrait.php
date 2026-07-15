<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LanguagePageTitleTrait{ //LanguagePageTitle

    private function GetLanguagePageTitle( $keyName ){

        $result = '';

        $file = $keyName.'/LanguagePageTitle.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLanguagePageTitle(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/LanguagePageTitle.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


