<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

use App\Http\Controllers\Page\Admin\Traits\GetUniqFileNameTrait;
use App\Http\Controllers\Traits\GetAudioFilePuthTrait;
use App\Http\Controllers\Page\Admin\Traits\GetAudioCollectionByWordIdTrait;

use App\Models\AudioCn;
use App\Models\AudioDe;
use App\Models\AudioEn;
use App\Models\AudioEs;
use App\Models\AudioFr;
use App\Models\AudioGr;
use App\Models\AudioIt;
use App\Models\AudioJp;
use App\Models\AudioKr;
use App\Models\AudioTr;


trait CreateAudioFileTrait{

    use GetUniqFileNameTrait;
    use GetAudioFilePuthTrait;
    use GetAudioCollectionByWordIdTrait;

    public function CreateAudioFile( $params ){

        $keyName =          $params[ 'keyName' ];
        $word_foreign_id =  $params[ 'word_foreign_id' ];
        $base64 =           $params[ 'base64' ];
        $name =             $params[ 'name' ];
        $lessonId =         isset( $params[ 'lessonId' ] )? $params[ 'lessonId' ]: null; // null  or id

        $puth = $this->GetAudioFilePuth( $keyName, $lessonId );
        $fileNameUnic = $this->GetUniqFileName( $name, $puth );

        $audioCollection = $this->GetAudioCollectionByWordId( $keyName, $word_foreign_id );
        $audioModel = $audioCollection->where( 'file_name', '=', $fileNameUnic )->first();
        if( $audioModel === null ){
            $newAudioModel = $this->CreateNewAudioModel( $keyName );
            $keyName_low = strtolower( $keyName );
            $foreign_key = 'word_'.$keyName_low.'_id';

            $lesson_foreign_id = 'lesson_'.$keyName_low.'_id';

            $newAudioModel->$foreign_key = $word_foreign_id;
            $newAudioModel->$lesson_foreign_id = $lessonId;
            $newAudioModel->file_name = $fileNameUnic;
            $newAudioModel->save();

        };

        Storage::disk( 'audio' )->put( $puth.'/'.$fileNameUnic, base64_decode( $base64 ) );

        return $fileNameUnic;
        

    }

    private function CreateNewAudioModel( $keyName ){
        $result = null;

        if( $keyName === 'EN' ){
            $result = new AudioEn;
        }else if( $keyName === 'DE' ){
            $result = new AudioDe;
        }else if( $keyName === 'CN' ){
            $result = new AudioCn;
        }else if( $keyName === 'FR' ){
            $result = new AudioFr;
        }else if( $keyName === 'ES' ){
            $result = new AudioEs;
        }else if( $keyName === 'IT' ){
            $result = new AudioIt;
        }else if( $keyName === 'GR' ){
            $result = new AudioGr;
        }else if( $keyName === 'JP' ){
            $result = new AudioJp;
        }else if( $keyName === 'KR' ){
            $result = new AudioKr;
        }else if( $keyName === 'TR' ){
            $result = new AudioTr;
        };

        return $result;
    }

}


?>


