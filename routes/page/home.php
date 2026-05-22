<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\Home\HomeController;
use App\Http\Controllers\Page\Post\TestController;

Route::get( '/', [ HomeController::class, 'get' ])->name('home');


Route::post( '/test-route', [ TestController::class, 'post' ]);



// Route::post( '/', [ GetStartingDataController::class, 'post' ]);

// Route::resource( '/home/get-starting-data', ApiDevelopmentController::class);


// Route::prefix('/home')->middleware( [ 'web' ] )->group(function ($router) {

//     Route::post('/get-starting-data',    [ 'uses' => 'Post\GetStartingData\GetStartingDataHomeController@post' ]);

// });

// Route::get('/home', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



?>