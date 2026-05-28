<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\Page\Admin\Traits\CreateAudioFileTrait;

// use Storage;

use App\Models\WordEn;

use Validator;


trait CreateFreeWordEnTrait{

    use CreateAudioFileTrait;

    public function CreateFreeWordEn( $params ){

        $result = [];
        
        $kayName =          $params[ 'kayName' ];
        $word_en =          $params[ 'word_en' ];
        $word_ru =          $params[ 'word_ru' ];
        $transcription =    $params[ 'transcription' ];
        $files =            $params[ 'files' ];

        $wordEn = new WordEn;
        $wordEn->en = $word_en;
        $wordEn->ru = $word_ru;
        $wordEn->transcription = $transcription;
        $wordEn->save();

        $word_en_id = $wordEn->id;

        for( $i = 0; $i < count( $files ); $i++ ){
            $name = $files[ $i ][ 'name' ];
            $base64 = $files[ $i ][ 'base64' ];

            $res = $this->CreateAudioFile([
                'kayName' =>    $kayName,
                'word_en_id' => $word_en_id,
                'name' =>       $name,
                'base64' =>     $base64,
            ]);


            $result[ 'audio' ] = $res;

        };
        
        

        
        
        return $result;
        
        
    }

}


?>


