<?php 

namespace App\Http\Controllers\Traits;

use Storage;

trait SetUserLessonResultTrait{

    public function SetUserLessonResult( $params ){
        
        $keyName =  $params[ 'keyName' ];
        $lessonId = $params[ 'lessonId' ];
        $guestId =  $params[ 'guestId' ];
        $userResult = $params[ 'userResult' ];

        $file = '/'.$guestId.'/'.$keyName.'/'.$lessonId.'.json';

        $userResult[ 'lessonId' ] = $lessonId;

        $json = json_encode( $userResult, JSON_UNESCAPED_UNICODE );

        // if( Storage::disk('userResult')->exists( $file ) ){
        //     $json = Storage::disk( 'userResult' )->get( $file );
        //     $obj = json_decode( $json );
        // }else{
        //     $obj = $userResult;
        // };

        Storage::disk( 'userResult' )->put( $file, $json );

        return $file;


        
        
        
        
    }

}


?>


