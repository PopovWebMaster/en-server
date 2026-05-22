<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

use Auth;
use Artisan;

use Storage;

class StartGoController extends SiteController
{
     public function __construct(){
        parent::__construct();
        // $this->middleware('auth');
        
    }

    function get( Request $request ){

        // Artisan::call('cache:clear');
        // Artisan::call('config:cache');
        // Artisan::call('view:clear');
        // Artisan::call('route:clear');
        
        // Artisan::call('storage:link');
        // Artisan::call('migrate');
        // Artisan::call('db:seed');

        // dd( config( 'app' ) );


//         $path = Storage::disk('assets_js')->path('my-text.txt');

//         $text = file_get_contents( $path );
 
// //$text = mb_convert_encoding($text, 'UTF-8', 'AUTO');
// //$text = mb_convert_encoding($text, 'UTF-8', 'ANSI');
// //$text = mb_convert_encoding($text, 'UTF-8', 'WINDOWS-1251');
// $text = iconv('WINDOWS-1251', 'UTF-8', $text);
 
// file_put_contents($path, $text);


//         // return response()->download($path, basename($path));
//         return response()->download($path );



        dd( 'start-go' );

    }
}
