<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\PartOfSpeech;


trait GetPartOfSpeechListTrait{

    public function GetPartOfSpeechList(){

        $result = [];

        $partOfSpeech = PartOfSpeech::get();

        foreach( $partOfSpeech as $model ){
            array_push( $result, [
                'id' => $model->id,
                'name' => $model->name,
            ] );
        };

        return $result;
        
        
    }

}


?>


