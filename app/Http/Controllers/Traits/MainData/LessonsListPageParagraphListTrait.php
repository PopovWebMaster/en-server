<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait LessonsListPageParagraphListTrait{ // LessonsListPageParagraphList

    private function GetLessonsListPageParagraphList(){

        $result = [];

        $file = '/LessonsListPageParagraphList.json';

        if( Storage::disk('mainData')->exists( $file ) ){
            $json = Storage::disk( 'mainData' )->get( $file  );
            $result = json_decode( $json );
        };

        return $result;


    }

    private function SetLessonsListPageParagraphList( $list ){

        $result = '';
        $file = '/LessonsListPageParagraphList.json';

        $json = json_encode( $list, JSON_UNESCAPED_UNICODE );

        Storage::disk( 'mainData' )->put( $file, $json );
        

        return $result;
        
    }

}


?>


