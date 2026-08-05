<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait TestLanguagePageParagraphListTrait{ // TestLanguagePageParagraphList

    private function GetTestLanguagePageParagraphList( $keyName ){

        $result = [];

        $file = $keyName.'/TestLanguagePageParagraphList.json';

        if( Storage::disk('mainData')->exists( $file ) ){
            $json = Storage::disk( 'mainData' )->get( $file  );
            $result = json_decode( $json );
        };

        return $result;


    }

    private function SetTestLanguagePageParagraphList( $keyName, $list ){

        $result = '';
        $file = $keyName.'/TestLanguagePageParagraphList.json';

        $json = json_encode( $list, JSON_UNESCAPED_UNICODE );

        Storage::disk( 'mainData' )->put( $file, $json );
        

        return $result;
        
    }

}


?>


