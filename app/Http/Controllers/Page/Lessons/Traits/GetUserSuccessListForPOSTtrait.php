<?php 

namespace App\Http\Controllers\Page\Lessons\Traits;

use App\Http\Controllers\Traits\GetUserSuccessListTrait;

trait GetUserSuccessListForPOSTtrait{

    use GetUserSuccessListTrait;

    public function GetUserSuccessListForPOST( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $result[ 'userSuccessList' ] = $this->GetUserSuccessList();

        $result[ 'ok' ] = true;
 
        return $result;
        
        
    }

}


?>


