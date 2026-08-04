<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestsListPageTitleTrait{ //TestsListPageTitle

    private function GetTestsListPageTitle(){

        $result = '';

        $file = '/TestsListPageTitle.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestsListPageTitle(  $value ){

        $result = '';
        $file = '/TestsListPageTitle.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


