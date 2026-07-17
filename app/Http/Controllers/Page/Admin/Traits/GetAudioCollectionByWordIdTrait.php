<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\AudioCn;
use App\Models\AudioDe;
use App\Models\AudioEn;
use App\Models\AudioEs;
use App\Models\AudioFr;
use App\Models\AudioGr;
use App\Models\AudioIt;
use App\Models\AudioJp;
use App\Models\AudioKr;
use App\Models\AudioTr;


trait GetAudioCollectionByWordIdTrait{

    public function GetAudioCollectionByWordId( $keyName, $wordId ){
        $result = [];
        if( $keyName === 'EN' ){
            $result = AudioEn::where( 'word_en_id', '=', $wordId )->get();

        }else if( $keyName === 'DE' ){
            $result = AudioDe::where( 'word_de_id', '=', $wordId )->get();
            
        }else if( $keyName === 'CN' ){
            $result = AudioCn::where( 'word_cn_id', '=', $wordId )->get();
            
        }else if( $keyName === 'FR' ){
            $result = AudioFr::where( 'word_fr_id', '=', $wordId )->get();
            
        }else if( $keyName === 'ES' ){
            $result = AudioEs::where( 'word_es_id', '=', $wordId )->get();
            
        }else if( $keyName === 'IT' ){
            $result = AudioIt::where( 'word_it_id', '=', $wordId )->get();
            
        }else if( $keyName === 'GR' ){
            $result = AudioGr::where( 'word_gr_id', '=', $wordId )->get();
            
        }else if( $keyName === 'JP' ){
            $result = AudioJp::where( 'word_jp_id', '=', $wordId )->get();
            
        }else if( $keyName === 'KR' ){
            $result = AudioKr::where( 'word_kr_id', '=', $wordId )->get();
            
        }else if( $keyName === 'TR' ){
            $result = AudioTr::where( 'word_tr_id', '=', $wordId )->get();
            
        };

        return $result;
    }



}


?>


