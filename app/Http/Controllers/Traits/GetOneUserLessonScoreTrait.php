<?php 

namespace App\Http\Controllers\Traits;

use Storage;

trait GetOneUserLessonScoreTrait{

    public function GetOneUserLessonScore( $guestId, $keyName, $lessonId ){

        $result = null;

        if( Storage::disk('userResult')->exists( '/'.$guestId.'/'.$keyName.'/'.$lessonId.'.json' ) ){
            $json = Storage::disk( 'userResult' )->get( '/'.$guestId.'/'.$keyName.'/'.$lessonId.'.json' );
            $obj = json_decode( $json );
            if( isset( $obj->all ) && isset( $obj->good ) ){
                $result = round( ( ( $obj->good / $obj->all ) * 5 ), 1 );
            };
        };

        return $result;
        
    }

}


?>


