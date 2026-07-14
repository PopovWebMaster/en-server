<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\PageTitle;

use App\Http\Controllers\Traits\MainData\MainDataTrait;


trait GetMainPageDataTrait{

    use MainDataTrait;

    public function GetMainPageData( $keyName ){

        $result = [];


        if( $keyName === 'EN' ){
            $result = $this->GetMainData( $keyName );
           

        };


        
        return $result;
        
        
    }

}


?>


