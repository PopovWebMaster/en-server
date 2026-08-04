<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait TestsListPageDescriptionTrait{ //TestsListPageDescription

    private function GetTestsListPageDescription(){

        $result = '';

        $file = '/TestsListPageDescription.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTestsListPageDescription( $value ){

        $result = '';
        $file = '/TestsListPageDescription.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


