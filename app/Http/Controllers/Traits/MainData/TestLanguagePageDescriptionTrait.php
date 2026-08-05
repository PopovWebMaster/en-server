<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestLanguagePageDescriptionTrait{ //TestLanguagePageDescription

    private function GetTestLanguagePageDescription( $keyName ){

        $result = '';

        $file = $keyName.'/TestLanguagePageDescription.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestLanguagePageDescription(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/TestLanguagePageDescription.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


