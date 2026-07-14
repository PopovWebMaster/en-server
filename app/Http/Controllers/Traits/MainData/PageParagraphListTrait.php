<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait PageParagraphListTrait{ // PageParagraphList

    private function GetPageParagraphList( $keyName ){

        $result = [];

        $file = '/PageParagraphList.json';

        if( Storage::disk('mainData')->exists( $file ) ){
            $json = Storage::disk( 'mainData' )->get( $file  );
            $result = json_decode( $json );
        };

        return $result;


    }

    private function SetPageParagraphList( $keyName, $list ){

        $result = '';
        $file = '/PageParagraphList.json';

        $json = json_encode( $list, JSON_UNESCAPED_UNICODE );

        Storage::disk( 'mainData' )->put( $file, $json );
        

        return $result;
        
    }

}


?>


