<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestLanguagePageKeywordsTrait{ //TestLanguagePageKeywords

    private function GetTestLanguagePageKeywords( $keyName ){

        $result = '';

        $file = $keyName.'/TestLanguagePageKeywords.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestLanguagePageKeywords(  $keyName, $value ){

        $result = '';
        $file = $keyName.'/TestLanguagePageKeywords.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


