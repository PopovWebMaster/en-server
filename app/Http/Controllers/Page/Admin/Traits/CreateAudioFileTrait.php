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

        $keyName =          $params[ 'keyName' ];
        // $word_en_id =       $params[ 'word_en_id' ];
        $word_foreign_id =  $params[ 'word_foreign_id' ];

        $base64 =           $params[ 'base64' ];
        $name =             $params[ 'name' ];
        $lessonId =     isset( $params[ 'lessonId' ] )? $params[ 'lessonId' ]: null; // null  or id


        $result = '';

        $fileName =         $name;
        $puth = $this->GetAudioFilePuth( $keyName, $lessonId );
        $fileNameUnic = $this->GetUniqFileName( $name, $puth );
       

        if( $keyName === 'EN' ){

            Storage::disk( 'audio' )->put( $puth.'/'.$fileNameUnic, base64_decode( $base64 ) ); // должна быть тут, чтоб видно было что не сработало, если что
            
            $audioEn = AudioEn::where( 'word_en_id', '=', $word_foreign_id )->where( 'file_name', '=', $fileNameUnic )->first();
            if( $audioEn === null ){
                $audioEnModel = new AudioEn;
                $audioEnModel->word_en_id = $word_foreign_id;
                $audioEnModel->lesson_en_id = $lessonId;
                $audioEnModel->file_name = $fileNameUnic;
                $audioEnModel->save();
            };

            $result = $fileNameUnic;

        };

        return $fileNameUnic;
        

    }

}


?>


