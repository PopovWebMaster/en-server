<?php 

namespace App\Http\Controllers\Traits;

use Storage;

use App\Http\Controllers\Traits\GetAudioFilePuthTrait;


trait GetAudioBase64Trait{

    use GetAudioFilePuthTrait;

    public function GetAudioBase64( $params ){

        $keyName =  $params[ 'keyName' ];
        $name =     $params[ 'name' ];
        $lessonId = $params[ 'lessonId' ];

        $result = '';

        $puth = $this->GetAudioFilePuth( $keyName, $lessonId );
        if( Storage::disk( 'audio' )->exists( $puth.'/'.$name ) ){

            $fullPath = Storage::disk( 'audio' )->path( $puth.'/'.$name );
            $extension = pathinfo( $fullPath, PATHINFO_EXTENSION );
            $base64 = base64_encode( Storage::disk( 'audio' )->get( $puth.'/'.$name ) );
            if( $extension === 'mp3' || $extension === 'MP3' ){
                $base64 = str_replace('dataaudio/mpegbase64//', '', $base64);
                // 'data:audio/mpeg;base64,//uUxAAAAAAAAAAAA
                $base64 = 'data:audio/mpeg;base64,//'.$base64;
            };


            $result = $base64;
        };

        
        return $result;
        
        
    }

}


?>


