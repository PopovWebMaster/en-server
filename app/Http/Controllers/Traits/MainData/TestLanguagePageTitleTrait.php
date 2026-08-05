<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestLanguagePageTitleTrait{ //TestLanguagePageTitle

    private function GetTestLanguagePageTitle( $keyName ){

        $result = '';

        $file = $keyName.'/TestLanguagePageTitle.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestLanguagePageTitle( $keyName, $value ){

        $result = '';
        $file = $keyName.'/TestLanguagePageTitle.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


