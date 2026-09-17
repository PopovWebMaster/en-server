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

trait GetWordModelByRequestTrait{

    public function GetWordModelByRequest( $keyName, $valueName, $value ){

        $result = [];

        if( $keyName === 'EN' ){
            $result = WordEn::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'DE' ){
            $result = WordDe::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'CN' ){
            $result = WordCn::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'FR' ){
            $result = WordFr::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'ES' ){
            $result = WordEs::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'IT' ){
            $result = WordIt::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'GR' ){
            $result = WordGr::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'JP' ){
            $result = WordJp::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'KR' ){
            $result = WordKr::where( $valueName, '=', $value )->get();
        }else if( $keyName === 'TR' ){
            $result = WordTr::where( $valueName, '=', $value )->get();
        };

        return $result;
        
        
    }

    



}


?>


