<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait SiteParagraphListTrait{ // SiteParagraphList

    private function GetSiteParagraphList(){

        $result = [];

        $file = '/SiteParagraphList.json';

        if( Storage::disk('mainData')->exists( $file ) ){
            $json = Storage::disk( 'mainData' )->get( $file  );
            $result = json_decode( $json );
        };

        return $result;


    }

    private function SetSiteParagraphList( $list ){

        $result = '';
        $file = '/SiteParagraphList.json';

        $json = json_encode( $list, JSON_UNESCAPED_UNICODE );

        Storage::disk( 'mainData' )->put( $file, $json );
        

        return $result;
        
    }

}


?>


