<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\Admin\AdminController;
use App\Http\Controllers\Page\Admin\Post\AddNewWordController;
use App\Http\Controllers\Page\Admin\Post\CheckWordEnForUniqController;





// Route::get( '/admin', [ AdminController::class, 'get' ])->middleware( [  'auth','web', 'admin.only_admin_get', ] )->name('admin');
Route::get( '/admin', [ AdminController::class, 'get' ])->middleware( [ 'admin.only_admin_get', ] )->name('admin');




// Route::post( '/test-route', [ TestController::class, 'post' ]);



// Route::post( '/', [ GetStartingDataController::class, 'post' ]);

// Route::resource( '/home/get-starting-data', ApiDevelopmentController::class);


Route::prefix('/admin')->middleware( [ 'auth', 'web', 'admin.only_admin_post' ] )->group(function ($router) {

    Route::post('/add-new-word', [ AddNewWordController::class, 'post' ]);
    Route::post('/chack-word-en-for-uniq', [ CheckWordEnForUniqController::class, 'post' ]);


});

// Route::get('/home', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



?>