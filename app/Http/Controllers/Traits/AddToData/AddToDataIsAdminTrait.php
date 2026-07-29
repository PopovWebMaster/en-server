<?php 

namespace App\Http\Controllers\Traits\AddToData;

use Auth;

trait AddToDataIsAdminTrait{

    public function AddToDataIsAdmin(){

        $user = Auth::user();
        $this->data[ 'isAdmin' ] = false;
        
        if( $user !== null ){
            if( $user->email === config( 'app.admin_email' ) ){
                $this->data[ 'isAdmin' ] = true;
            };
        };
 
    }

}


?>


