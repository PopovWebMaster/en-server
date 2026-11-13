<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;


trait TextBeforeButtonStartTrait{ // TextBeforeButtonStart

    private function GetTextBeforeButtonStart(){

        $result = '';

        $file = '/TextBeforeButtonStart.txt';

        if( Storage::disk('mainData')->exists( $file ) ){
            $result = Storage::disk( 'mainData' )->get( $file );
        };

        return $result;


    }

    private function SetTextBeforeButtonStart( $value ){

        $result = '';
        $file = '/TextBeforeButtonStart.txt';

        Storage::disk( 'mainData' )->put( $file, $value );
        

        return $result;
        
    }

}


?>


