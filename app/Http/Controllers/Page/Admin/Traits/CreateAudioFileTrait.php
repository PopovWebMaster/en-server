<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\Page\Admin\Traits\GetUniqFileNameTrait;
use App\Http\Controllers\Traits\GetAudioFilePuthTrait;

use App\Models\AudioEn;

trait CreateAudioFileTrait{

    use GetUniqFileNameTrait;
    use GetAudioFilePuthTrait;

    public function CreateAudioFile( $params ){

        $keyName =          $params[ 'kayName' ];
        $word_en_id =       $params[ 'word_en_id' ];
        $base64 =           $params[ 'base64' ];
        $name =             $params[ 'name' ];
        $lesson_en_id =     isset( $params[ 'lesson_en_id' ] )? $params[ 'lesson_en_id' ]: null; // null  or id

        $fileName =         $name;

        // $puth = '/'.$kayName.'/';

        // if( $lesson_en_id !== null ){
        //     $puth = '/'.$kayName.'/'.$lesson_en_id.'/';
        // };

        // $fileNameUnic = $this->GetUniqFileName( $name, $puth );

        // Storage::disk( 'audio' )->put( $puth.'/'.$fileNameUnic, base64_decode( $base64 ) );
        $puth = $this->GetAudioFilePuth( $keyName, $lesson_en_id );

        $fileNameUnic = $this->GetUniqFileName( $name, $puth );

        Storage::disk( 'audio' )->put( $puth.'/'.$fileNameUnic, base64_decode( $base64 ) );

        $audioEn = AudioEn::where( 'word_en_id', '=', $word_en_id )->where( 'file_name', '=', $fileNameUnic )->first();
        if( $audioEn === null ){
            $audioEnModel = new AudioEn;
            $audioEnModel->word_en_id = $word_en_id;
            $audioEnModel->lesson_en_id = $lesson_en_id;
            $audioEnModel->file_name = $fileNameUnic;
            $audioEnModel->save();
        };


        return $fileNameUnic;

    }

}


?>


