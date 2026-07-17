<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\Page\Admin\Traits\CreateAudioFileTrait;

use App\Models\WordEn;
use App\Models\WordCn;
use App\Models\WordDe;
use App\Models\WordEs;
use App\Models\WordFr;
use App\Models\WordGr;
use App\Models\WordIt;
use App\Models\WordJp;
use App\Models\WordKr;
use App\Models\WordTr;


trait CreateFreeWordTrait{

    use CreateAudioFileTrait;

    public function CreateFreeWord( $params ){

        $result = [];
        
        $keyName =          $params[ 'keyName' ];
        $word_foreign =     $params[ 'word_foreign' ];
        $word_ru =          $params[ 'word_ru' ];
        $transcription =    $params[ 'transcription' ];
        $files =            $params[ 'files' ];

        $wordModel = null;

        if( $keyName === 'EN' ){
            $wordModel = new WordEn;
        }else if( $keyName === 'DE' ){
            $wordModel = new WordDe;
        }else if( $keyName === 'CN' ){
            $wordModel = new WordCn;
        }else if( $keyName === 'FR' ){
            $wordModel = new WordFr;
        }else if( $keyName === 'ES' ){
            $wordModel = new WordEs;
        }else if( $keyName === 'IT' ){
            $wordModel = new WordIt;
        }else if( $keyName === 'GR' ){
            $wordModel = new WordGr;
        }else if( $keyName === 'JP' ){
            $wordModel = new WordJp;
        }else if( $keyName === 'KR' ){
            $wordModel = new WordKr;
        }else if( $keyName === 'TR' ){
            $wordModel = new WordTr;
        };

        $word_foreign_id = null;

        if( $wordModel !== null ){

            $keyName_low = strtolower( $keyName );
            $wordModel->$keyName_low = $word_foreign;
            $wordModel->ru = $word_ru;
            $wordModel->transcription = $transcription;
            $wordModel->save();

            $word_foreign_id = $wordModel->id;

            for( $i = 0; $i < count( $files ); $i++ ){
                $name = $files[ $i ][ 'name' ];
                $base64 = $files[ $i ][ 'base64' ];

                $res = $this->CreateAudioFile([
                    'keyName' =>            $keyName,
                    'word_foreign_id' =>    $word_foreign_id,
                    'name' =>               $name,
                    'base64' =>             $base64,
                ]);

                $result[ 'audio' ] = $res;

            };


        };


        return $word_foreign_id;

        
        
    }

}


?>


