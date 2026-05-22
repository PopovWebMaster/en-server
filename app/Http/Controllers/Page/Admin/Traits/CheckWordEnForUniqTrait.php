<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

// use Storage;




trait CheckWordEnForUniqTrait{

    public function CheckWordEnForUniq( $request ){

        $result = [
            'ok' => true,
            'message' => '',
        ];

        // $result[ 'isUniq' ] = false;
        $result[ 'isUniq' ] = true;


        sleep( 1 );



       
        

        return $result;
        
        
    }

}


?>


