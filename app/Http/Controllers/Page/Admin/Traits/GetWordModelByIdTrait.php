<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

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

trait GetWordModelByIdTrait{

    public function GetWordModelById( $keyName, $wordId ){

        $result = null;

        if( $keyName === 'EN' ){
            $result = WordEn::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'DE' ){
            $result = WordDe::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'CN' ){
            $result = WordCn::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'FR' ){
            $result = WordFr::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'ES' ){
            $result = WordEs::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'IT' ){
            $result = WordIt::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'GR' ){
            $result = WordGr::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'JP' ){
            $result = WordJp::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'KR' ){
            $result = WordKr::where( 'id', '=', $wordId )->first();
        }else if( $keyName === 'TR' ){
            $result = WordTr::where( 'id', '=', $wordId )->first();
        };

        return $result;
        
        
    }

    



}


?>


