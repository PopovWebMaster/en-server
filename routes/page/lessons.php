<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\Lessons\LessonsController;
use App\Http\Controllers\Page\Lesson\LessonController;
use App\Http\Controllers\Page\LanguageLesLanguage\LanguageLessonsController;


Route::get( '/lessons', [ LessonsController::class, 'get' ])->name('lessons');
Route::get( '/lessons/{languageAlias}', [ LanguageLessonsController::class, 'get' ])->middleware( [ 'get.check_language_alias' ] )->name('language_lessons');
Route::get( '/lessons/{languageAlias}/{lessonId?}', [ LessonController::class, 'get' ])->middleware( [ 'get.check_language_alias', 'get.check_lesson_id' ] )->name('one_lessons');






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