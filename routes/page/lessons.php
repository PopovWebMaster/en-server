<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\Lessons\LessonsController;
use App\Http\Controllers\Page\Lesson\LessonController;
use App\Http\Controllers\Page\LanguageLesLanguage\LanguageLessonsController;
use App\Http\Controllers\Page\Lessons\Post\GetLessonAppWordsListController;
use App\Http\Controllers\Page\Lessons\Post\GetLessonAppDataController;




Route::get( '/lessons', [ LessonsController::class, 'get' ])->name('lessons');
Route::get( '/lessons/{languageAlias}', [ LanguageLessonsController::class, 'get' ])->middleware( [ 'get.check_language_alias' ] )->name('language_lessons');
Route::get( '/lessons/{languageAlias}/{lessonId?}', [ LessonController::class, 'get' ])->middleware( [ 'get.check_language_alias', 'get.check_lesson_id' ] )->name('one_lessons');



Route::prefix('/lessons')->middleware( [ ] )->group(function ($router) {

    Route::post('/get-lesson-app-words-list', [ GetLessonAppWordsListController::class, 'post' ]);
    Route::post('/get-lesson-app-data', [ GetLessonAppDataController::class, 'post' ]);



});






?>