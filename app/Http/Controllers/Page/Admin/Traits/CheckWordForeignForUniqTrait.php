<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

// use Storage;

use App\Models\WordEn;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateWordEnTrait;

use Validator;


trait CheckWordForeignForUniqTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateWordEnTrait;

    public function CheckWordForeignForUniq( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'isUniq' => false,
        ];

        $validadeKeyName = $this->ValidateLanguageKeyName( $request );

        if( $validadeKeyName[ 'ok' ] ){
            $kayName = $validadeKeyName[ 'value' ];

            if( $kayName === 'EN' ){

                $validateWordEn = $this->ValidateWordEn( $request );
                
                if( $validateWordEn[ 'ok' ] ){
                    $word_en = $validateWordEn[ 'value' ];

                    $result[ 'ok' ] = true;

                    $wordEn = WordEn::where( 'en', '=', $word_en )->first();
                    if( $wordEn === null ){
                        $result[ 'isUniq' ] = true;
                    };


                }else{
                    $result[ 'message' ] = $validateWordEn[ 'message' ];
                };

            }else{
                $result[ 'message' ] = 'Проверка на уникальность иностранного слова для '.$kayName.' не прописана' ;
            };

        }else{
            $result[ 'message' ] = $validadeKeyName[ 'message' ];
        };


        return $result;
        
        
    }

}


?>


