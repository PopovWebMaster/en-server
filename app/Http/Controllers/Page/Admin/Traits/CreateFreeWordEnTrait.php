<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

// use Storage;

use App\Models\WordEn;

use Validator;


trait CreateFreeWordEnTrait{

    public function CreateFreeWordEn( $params ){
        
        $kayName =          $params[ 'kayName' ];
        $word_en =          $params[ 'word_en' ];
        $word_ru =          $params[ 'word_ru' ];
        $transcription =    $params[ 'transcription' ];
        $files =            $params[ 'files' ];

        
        
        // return $result;
        
        
    }

}


?>


