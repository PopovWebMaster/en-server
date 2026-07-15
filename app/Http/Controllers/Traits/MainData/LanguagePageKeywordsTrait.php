<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LanguagePageKeywordsTrait{ //LanguagePageKeywords

    private function GetLanguagePageKeywords( $keyName ){

        $result = '';

        $file = $keyName.'/LanguagePageKeywords.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLanguagePageKeywords(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/LanguagePageKeywords.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


