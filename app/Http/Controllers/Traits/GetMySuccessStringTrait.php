<?php 

namespace App\Http\Controllers\Traits;

use Storage;

trait GetMySuccessStringTrait{

    public function GetMySuccessString( $guestId, $keyName ){

        $result = '0 слов';

        if( $guestId !== null ){

            $count = 0;
            $files = Storage::disk('userResult')->files( $guestId.'/'.$keyName );
            
            foreach( $files as $puth ) {
                $json = Storage::disk( 'userResult' )->get( $puth );
                $obj = json_decode( $json );
                $count = $count + (int) $obj->good;
            };

            $result = $this->AddStringWordsToCount( $count );

        };

        return $result;
        
    }

    private function AddStringWordsToCount( $num ){
        $result = '';

        $lastNum = (int) substr( (string) $num, -1 );
        $str = '';
        $arr = [ 'слово', 'слова', 'слов',  ];
        switch( $lastNum ){
            case 0:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                $str = $arr[ 2 ];
                break;
            case 1:
                $str = $arr[ 0 ];
                break;
            case 2:
            case 3:
            case 4:
                $str = $arr[ 1 ];
                break;
        };

        $result = $num.' '.$str;

        return $result;
    }

}


?>


