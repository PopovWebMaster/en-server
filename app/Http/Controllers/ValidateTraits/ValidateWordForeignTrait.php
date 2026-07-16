<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

use App\Models\WordEn;
use App\Models\WordCn;
use App\Models\WordDe;
use App\Models\WordEs;
use App\Models\WordFr;
use App\Models\WordGr;
use App\Models\WordIt;
use App\Models\WordJp;
use App\Models\WordKr;
use App\Models\WordTr;


trait ValidateWordForeignTrait{

    public function ValidateWordForeign( $request, $uniq = false ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $wordForeign =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'word_foreign' ] )? $request[ 'data' ][ 'word_foreign' ]: null: null;
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $wordForeign;

        $max = config( 'languages.languages.'.$keyName.'.max' );

        $validate = Validator::make( [ 
            'wordForeign' => $wordForeign,
        ], [
            'wordForeign' => [ 'required', 'string', 'min:1', 'max:'.$max ],

        ]);


        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            if( $uniq === true ){

                $wordModel = null;

                if( $keyName === 'EN' ){
                    $wordModel = WordEn::where( 'en', '=', $wordForeign )->first();

                }else if( $keyName === 'DE' ){
                    $wordModel = WordDe::where( 'de', '=', $wordForeign )->first();

                }else if( $keyName === 'CN' ){
                    $wordModel = WordCn::where( 'cn', '=', $wordForeign )->first();

                }else if( $keyName === 'FR' ){
                    $wordModel = WordFr::where( 'fr', '=', $wordForeign )->first();

                }else if( $keyName === 'ES' ){
                    $wordModel = WordEs::where( 'es', '=', $wordForeign )->first();

                }else if( $keyName === 'IT' ){
                    $wordModel = WordIt::where( 'it', '=', $wordForeign )->first();

                }else if( $keyName === 'GR' ){
                    $wordModel = WordGr::where( 'gr', '=', $wordForeign )->first();

                }else if( $keyName === 'JP' ){
                    $wordModel = WordJp::where( 'jp', '=', $wordForeign )->first();

                }else if( $keyName === 'KR' ){
                    $wordModel = WordKr::where( 'kr', '=', $wordForeign )->first();

                }else if( $keyName === 'TR' ){
                    $wordModel = WordTr::where( 'tr', '=', $wordForeign )->first();

                };

                if( $wordModel === null ){
                    $result[ 'ok' ] = true;
                }else{
                    $result[ 'message' ] = "Это слово уже существует - ".$wordForeign;
                };

            }else{
                $result[ 'ok' ] = true;
            };

        };

        
        return $result;
        
        
    }

}


?>


