<?php 

namespace App\Http\Controllers\Traits\AddToData;

use App\Http\Controllers\Traits\MainData\MainDataTrait;


trait AddToDataLanguageDataTrait{

    use MainDataTrait;

    public function AddToDataLanguageData(){

        $this->data['languageActiveList'] = $this->GetLanguageActiveList();

 
    }

}


?>