<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait TestsListPageParagraphListTrait{ // TestsListPageParagraphList

    private function GetTestsListPageParagraphList(){

        $result = [];

        $file = '/TestsListPageParagraphList.json';

        if( Storage::disk('mainData')->exists( $file ) ){
            $json = Storage::disk( 'mainData' )->get( $file  );
            $result = json_decode( $json );
        };

        return $result;


    }

    private function SetTestsListPageParagraphList( $list ){

        $result = '';
        $file = '/TestsListPageParagraphList.json';

        $json = json_encode( $list, JSON_UNESCAPED_UNICODE );

        Storage::disk( 'mainData' )->put( $file, $json );
        

        return $result;
        
    }

}


?>


