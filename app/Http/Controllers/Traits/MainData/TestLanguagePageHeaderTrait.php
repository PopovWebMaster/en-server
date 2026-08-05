<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestLanguagePageHeaderTrait{ //TestLanguagePageHeader

    private function GetTestLanguagePageHeader(){

        $result = '';

        $file = '/TestLanguagePageHeader.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestLanguagePageHeader( $value ){

        $result = '';
        $file = '/TestLanguagePageHeader.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


