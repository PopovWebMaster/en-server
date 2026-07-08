<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\Admin\AdminController;
use App\Http\Controllers\Page\Admin\Post\AddNewWordController;
use App\Http\Controllers\Page\Admin\Post\ChackWordForeignForUniqController;
use App\Http\Controllers\Page\Admin\Post\GetStartingDataController;
use App\Http\Controllers\Page\Admin\Post\RemoveAudioFileController;
use App\Http\Controllers\Page\Admin\Post\AddAudioToWordController;
use App\Http\Controllers\Page\Admin\Post\SaveWordListChangesController;
use App\Http\Controllers\Page\Admin\Post\RemoveOneWordController;
use App\Http\Controllers\Page\Admin\Post\AddNewLessonController;
use App\Http\Controllers\Page\Admin\Post\SaveLessonListChangesController;
use App\Http\Controllers\Page\Admin\Post\SaveOneLessonDataChangesController;
use App\Http\Controllers\Page\Admin\Post\AddNewLessonPhraseController;









// Route::get( '/admin', [ AdminController::class, 'get' ])->middleware( [  'auth','web', 'admin.only_admin_get', ] )->name('admin');
Route::get( '/admin', [ AdminController::class, 'get' ])->middleware( [ 'admin.only_admin_get', ] )->name('admin');




// Route::post( '/test-route', [ TestController::class, 'post' ]);



// Route::post( '/', [ GetStartingDataController::class, 'post' ]);

// Route::resource( '/home/get-starting-data', ApiDevelopmentController::class);


Route::prefix('/admin')->middleware( [ 'auth', 'web', 'admin.only_admin_post' ] )->group(function ($router) {

    Route::post('/add-new-word', [ AddNewWordController::class, 'post' ]);
    Route::post('/chack-word-foreign-for-uniq', [ ChackWordForeignForUniqController::class, 'post' ]);
    Route::post('/get-starting-data', [ GetStartingDataController::class, 'post' ]);
    Route::post('/remove-audio-file', [ RemoveAudioFileController::class, 'post' ]);
    Route::post('/add-audio-files-to-word', [ AddAudioToWordController::class, 'post' ]);
    Route::post('/save-word-list-changes', [ SaveWordListChangesController::class, 'post' ]);
    Route::post('/remove-word', [ RemoveOneWordController::class, 'post' ]);
    Route::post('/add-new-lesson', [ AddNewLessonController::class, 'post' ]);
    Route::post('/save-lesson-list-changes', [ SaveLessonListChangesController::class, 'post' ]);
    Route::post('/save-one-lesson-changes', [ SaveOneLessonDataChangesController::class, 'post' ]);
    Route::post('/add-new-lesson-phrase', [ AddNewLessonPhraseController::class, 'post' ]);





    

    



});

// Route::get('/home', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



?>