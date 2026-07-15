<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LanguagePageDescriptionTrait{ //LanguagePageDescription

    private function GetLanguagePageDescription( $keyName ){

        $result = '';

        $file = $keyName.'/LanguagePageDescription.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLanguagePageDescription(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/LanguagePageDescription.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


