<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidatePartOfSpeechNameTrait;
use App\Http\Controllers\Page\Admin\Traits\GetPartOfSpeechListTrait;

use App\Models\PartOfSpeech;


trait AddNewPartOfSpeechTrait{

    use ValidatePartOfSpeechNameTrait;
    use GetPartOfSpeechListTrait;

    public function AddNewPartOfSpeech( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validatePartOfSpeechName = $this->ValidatePartOfSpeechName( $request, true );
        if( $validatePartOfSpeechName[ 'ok' ] ){
            $partOfSpeechName =  $validatePartOfSpeechName[ 'value' ];


            $partOfSpeech = new PartOfSpeech;
            $partOfSpeech->name = $partOfSpeechName;
            $partOfSpeech->save();

            $result[ 'partOfSpeechList' ] = $this->GetPartOfSpeechList();
            $result[ 'ok' ] = true;
            
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

        return $result;
        
    }

}


?>


