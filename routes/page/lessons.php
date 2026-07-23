<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\Lessons\LessonsController;
use App\Http\Controllers\Page\Lesson\LessonController;



Route::get( '/lessons', [ LessonsController::class, 'get' ])->name('lessons');
Route::get( '/lessons/{id?}', [ LessonController::class, 'get' ])->name('lessons');



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