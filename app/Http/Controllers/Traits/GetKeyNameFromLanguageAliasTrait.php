<?php 

namespace App\Http\Controllers\Traits;


trait GetKeyNameFromLanguageAliasTrait{

    public function GetKeyNameFromLanguageAlias( $alias ){

        $result = null;
        $arr = config( 'languages.languages' );
        foreach( $arr as $keyName => $item ){

            if( $item[ 'alias' ] === $alias ){
                $result = $keyName;
                break;
            };
        };

        return $result;
        
        
    }

}


?>


