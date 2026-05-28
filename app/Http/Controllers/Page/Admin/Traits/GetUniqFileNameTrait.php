<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;

trait GetUniqFileNameTrait{

    public function GetUniqFileName( $fileName, $puth ){

        $result = [];

        $name = substr( $fileName, 0, strrpos($fileName,'.') );
        $ext = substr( $fileName, strrpos( $fileName, '.' ) + 1);

        $fileNameWO_staples = '';
        $lastChar = substr( $name, -1 );
        if( $lastChar === ')' ){
            $pos = strrpos( $name, '(', -1 );
            if( $pos === false ){
                $fileNameWO_staples = $name;
            }else{
                $fileNameWO_staples = substr( $name, 0, $pos );
            };
        }else{
            $fileNameWO_staples = $name;
        };

        if( Storage::disk('audio')->exists( $puth.$fileName ) ){

            $lastNum = 0;

            $files = Storage::disk('audio')->files( $puth );
            $arr = [];
            for( $i = 0; $i < count( $files ); $i++ ){

                $name_array = explode( '/', $files[ $i ] );
                $onlyName = $name_array[ count( $name_array ) - 1 ];
                $pos = strpos( $onlyName, $fileNameWO_staples.'(' );
                if( $pos !== false ){

                    $pos_1 = strrpos( $onlyName, '(', -1 );
                    $pos_2 = strrpos( $onlyName, ')', -1 );

                    if( $pos_1 !== false && $pos_2 !== false ){
                        $num = substr( $onlyName, $pos_1+1, $pos_2-$pos_1-1 );
                        if( (int) $num > $lastNum ){
                            $lastNum = (int) $num;
                        };
                    };
                };
            };
            $lastNum = $lastNum + 1;

            $result = $fileNameWO_staples.'('.$lastNum.').'.$ext;

        }else{
            $result = $fileName;

        };
        
        return $result;

    }

}


?>


