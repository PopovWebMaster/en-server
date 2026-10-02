<?php 

namespace App\Http\Controllers\Traits;

use Cookie;

use App\Models\GuestId;

trait GetGuestIdTrait{

    public function GetGuestId(){

        $result = null;

        $cookieVal = Cookie::get( 'guestId' );

        $last_activity_sec = time();

        $shelfLife = 60*24*365*10;

        if( $cookieVal === null ){

            $guestId = new GuestId;
            $guestId->last_activity_sec = $last_activity_sec;
            $guestId->save();
            $result = $guestId->id;

            Cookie::queue( Cookie::make( 'guestId', $result, $shelfLife ) );

        }else{

            $guestId = GuestId::where( 'id', '=', $cookieVal )->first();

            if( $guestId === null ){

                $guestId = new GuestId;
                $guestId->last_activity_sec = $last_activity_sec;
                $guestId->save();
                $result = $guestId->id;

                Cookie::queue( Cookie::make( 'guestId', $result, $shelfLife ) );

            }else{

                $guestId->last_activity_sec = $last_activity_sec;
                $guestId->save();
                $result = $guestId->id;

            };
        };
       

        return $result;
        
        
    }

}


?>


