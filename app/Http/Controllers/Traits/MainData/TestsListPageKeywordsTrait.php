<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestsListPageKeywordsTrait{ //TestsListPageKeywords

    private function GetTestsListPageKeywords(){

        $result = '';

        $file = '/TestsListPageKeywords.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestsListPageKeywords( $value ){

        $result = '';
        $file = '/TestsListPageKeywords.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


