<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'guest']
    ],
    function () {
        Route::get('/', function () {
            return view('auth.login');
        });
    }
);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('dashboard', [HomeController::class, 'index'])->name('home');

        Route::group([], function () {
            Route::resource('level', LevelController::class);
        });

        Route::group([], function () {
            Route::resource('grade', GradeController::class);
            Route::post('delete_selected', [GradeController::class, 'DeleteSelected'])->name('delete.selected');
            Route::post('filter', [GradeController::class, 'FilterResults'])->name('filter');
        });

        Route::get('gradesperlevel/{level_id}', [SectionController::class, 'GradesPerLevel'])->name('gradesperlevel');
        Route::get('sectionspergrade/{grade_id}', [SectionController::class, 'SectionsPerGrade'])->name('sectionspergrade');

        Route::group([], function () {
            Route::resource('section', SectionController::class);
        });

        Route::view('add_guardian', 'guardian.add')->name('add_guardian');

        Route::group([], function () {
            Route::resource('teacher', TeacherController::class);
        });

        Route::group([], function () {
            Route::resource('student', StudentController::class);
        });
    }
);
