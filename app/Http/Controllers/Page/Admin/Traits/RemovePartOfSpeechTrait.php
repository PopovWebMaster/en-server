<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidatePartOfSpeechIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetPartOfSpeechListTrait;

use App\Models\PartOfSpeech;


trait RemovePartOfSpeechTrait{

    use ValidatePartOfSpeechIdTrait;
    use GetPartOfSpeechListTrait;

    public function RemovePartOfSpeech( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validatePartOfSpeechId = $this->ValidatePartOfSpeechId( $request );
        if( $validatePartOfSpeechId[ 'ok' ] ){
            $partOfSpeechId =  $validatePartOfSpeechId[ 'value' ];


            $partOfSpeech = PartOfSpeech::where( 'id', '=', $partOfSpeechId )->first();
            if( $partOfSpeech !== null ){
                $partOfSpeech->delete();
            };

            $result[ 'partOfSpeechList' ] = $this->GetPartOfSpeechList();
            $result[ 'ok' ] = true;
            
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

        return $result;
        
    }

}


?>


