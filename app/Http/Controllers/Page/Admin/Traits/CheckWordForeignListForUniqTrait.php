<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordForeignListTrait;
use App\Http\Controllers\Page\Admin\Traits\GetDataOnUniquenessOfForeignWordTrait;


use Validator;


trait CheckWordForeignListForUniqTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateWordForeignListTrait;
    use GetDataOnUniquenessOfForeignWordTrait;

    public function CheckWordForeignListForUniq( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'chackedList' => [],
        ];

        $validadeKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validadeKeyName[ 'ok' ] ){
            $validateWordForeignList = $this->ValidateWordForeignList( $request );
            if( $validateWordForeignList[ 'ok' ] ){

                $keyName = $validadeKeyName[ 'value' ];
                $wordsForeignList =  $validateWordForeignList[ 'value' ];
                for( $i = 0; $i < count( $wordsForeignList ); $i++ ){
                    $wordForeign = $wordsForeignList[ $i ];
                    $uniqData = $this->GetDataOnUniquenessOfForeignWord([
                        'wordForeign' =>    $wordForeign,
                        'keyName' =>        $keyName,
                    ]);
                    array_push( $result[ 'chackedList' ], [
                        'message' =>        $uniqData[ 'message' ],
                        'wordForeign' =>    $wordForeign,
                        'isUniq' =>         $uniqData[ 'isUniq' ],
                    ] );

                };

                $result[ 'ok' ] = true;

            }else{
                $result[ 'message' ] = $validateWordForeignList[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };

        return $result;
        
    }

}


?>


