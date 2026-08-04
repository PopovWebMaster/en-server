<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestsListPageHeaderTrait{ //TestsListPageHeader

    private function GetTestsListPageHeader(){

        $result = '';

        $file = '/TestsListPageHeader.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestsListPageHeader( $value ){

        $result = '';
        $file = '/TestsListPageHeader.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


