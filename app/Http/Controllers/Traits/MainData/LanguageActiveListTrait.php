<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LanguageActiveListTrait{ //LanguageActiveList

    private function GetLanguageActiveList(){

        $result = [];

        $file = '/LanguageActiveList.txt';

        // if( Storage::disk('mainData')->exists( $file ) ){
        //     $result = Storage::disk( 'mainData' )->get( $file );
        // };

        if( Storage::disk('mainData')->exists( $file ) ){
            $json = Storage::disk( 'mainData' )->get( $file  );
            $result = json_decode( $json );
        };

        return $result;


    }

    private function SetLanguageActiveList( $value ){

        $result = [];
        $file = '/LanguageActiveList.txt';

        // Storage::disk( 'mainData' )->put( $file, $value );

        $json = json_encode( $value, JSON_UNESCAPED_UNICODE );

        Storage::disk( 'mainData' )->put( $file, $json );
        

        return $result;
        
    }

}


?>


