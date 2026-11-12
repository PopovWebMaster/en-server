<?php 

namespace App\Http\Controllers\Traits;

use Storage;

use App\Http\Controllers\Traits\GetGuestIdTrait;
use App\Http\Controllers\Traits\GetMySuccessForOneKeyNameTrait;
use App\Http\Controllers\Traits\MainData\MainDataTrait;

trait GetUserSuccessListTrait{

    use GetGuestIdTrait;
    use GetMySuccessForOneKeyNameTrait;
    use MainDataTrait;

    public function GetUserSuccessList(){

        $result = [];

        $guestId = $this->GetGuestId();
        $languageActiveList = $this->GetLanguageActiveList();

        for( $i = 0; $i < count( $languageActiveList ); $i++ ){
            $key_name = $languageActiveList[ $i ];

            $success = $this->GetMySuccessForOneKeyName( $guestId, $key_name );

            array_push( $result, [
                'keyName' =>        $key_name,
                'countNum' =>       $success[ 'countNum' ],
                'countString' =>    $success[ 'countString' ],
            ] );
        };

        return $result;
        
    }


}


?>


