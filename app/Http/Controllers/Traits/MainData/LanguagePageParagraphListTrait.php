<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait LanguagePageParagraphListTrait{ // LanguagePageParagraphList

    private function GetLanguagePageParagraphList( $keyName ){

        $result = [];

        $file = '/LanguagePageParagraphList.json';

        if( Storage::disk('mainData')->exists( $file ) ){
            $json = Storage::disk( 'mainData' )->get( $file  );
            $result = json_decode( $json );
        };

        return $result;


    }

    private function SetLanguagePageParagraphList( $keyName, $list ){

        $result = '';
        $file = '/LanguagePageParagraphList.json';

        $json = json_encode( $list, JSON_UNESCAPED_UNICODE );

        Storage::disk( 'mainData' )->put( $file, $json );
        

        return $result;
        
    }

}


?>


