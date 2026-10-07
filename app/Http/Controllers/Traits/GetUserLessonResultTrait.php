<?php 

namespace App\Http\Controllers\Traits;

use Storage;

trait GetUserLessonResultTrait{

    public function GetUserLessonResult( $params ){

        $keyName =  $params[ 'keyName' ];
        $guestId =  $params[ 'guestId' ];

        $result = [];

        if( $guestId !== null ){

            $files = Storage::disk('userResult')->files( $guestId.'/'.$keyName );
            foreach( $files as $puth ) {
                $json = Storage::disk( 'userResult' )->get( $puth );
                $obj = json_decode( $json );
                array_push( $result, $obj );
            };
        };

        return $result;
        
        
    }

}


?>


