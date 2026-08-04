<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\Tests\TestsController;


Route::get( '/test', [ TestsController::class, 'get' ])->name('test');
Route::get( '/test/{languageAlias}', [ TestsController::class, 'get' ])->name('language_test');
Route::get( '/test/{languageAlias}/{id?}', [ TestsController::class, 'get' ])->name('one_test');



// Route::post( '/test-route', [ TestController::class, 'post' ]);



// Route::post( '/', [ GetStartingDataController::class, 'post' ]);

// Route::resource( '/home/get-starting-data', ApiDevelopmentController::class);


// Route::prefix('/home')->middleware( [ 'web' ] )->group(function ($router) {

//     Route::post('/get-starting-data',    [ 'uses' => 'Post\GetStartingData\GetStartingDataHomeController@post' ]);

// });

// Route::get('/home', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');




?>