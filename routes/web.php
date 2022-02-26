<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Publication\PublicationController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\CourseStatus;


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
//Rutas Cursos
Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [ CourseController::class, 'show'])->name('courses.show');

Route::post('cursos/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('course-status/{course}', CourseStatus::class, 'status')->name('courses.status')->middleware('auth');

//Rutas Test
//Route::get('course-test/{id}', [TestController::class, 'quiz'])->name('quiz.join');

//Route::post('result/{id}/result', TestController::class, 'store')->name('quiz.store');
Route::post('test/{id}/result', [TestController::class, 'result'])->middleware('auth')->name('quiz.result');

//Rutas Repositorio Publicaciones
Route::get('publications', [PublicationController::class, 'index'])->name('publications.index');

Route::get('publications/{publication}', [PublicationController::class, 'show'])->name('publications.show');

Route::post('publications/{publication}/enrolled', [PublicationController::class, 'enrolled'])->middleware('auth')->name('publications.enrolled');

/* Route::get('publication-status/{publication}', PublicationStatus::class, 'status')->name('publications.status')->middleware('auth'); */
