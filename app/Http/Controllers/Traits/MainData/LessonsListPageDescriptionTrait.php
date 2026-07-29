<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

trait LessonsListPageDescriptionTrait{ //LessonsListPageDescription

    private function GetLessonsListPageDescription(){

        $result = '';

        $file = '/LessonsListPageDescription.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetLessonsListPageDescription( $value ){

        $result = '';
        $file = '/LessonsListPageDescription.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


