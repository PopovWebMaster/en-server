<?php 

namespace App\Http\Controllers\Traits;

// use Storage;

trait GetAudioFilePuthTrait{

    public function GetAudioFilePuth( $keyName, $lessonId ){

        $result = '';

        $puth = '/'.$keyName.'/';

        if( $lessonId !== null ){
            $puth = '/'.$keyName.'/'.$lessonId.'/';
        };

        $result = $puth;

        return $result;
        
        
    }

}


?>


