<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;

use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\DateController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\CategoryPublicationController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('levels', LevelController::class)->names('levels');

Route::resource('prices', PriceController::class)->names('prices');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');

///rutas publicaciones

Route::resource('categorypublications', CategoryPublicationController::class)->names('categorypublications');

Route::resource('languages', LanguageController::class)->names('languages');

Route::resource('dates', DateController::class)->names('dates');

Route::get('publications', [PublicationController::class, 'index'])->name('publications.index');

Route::get('publications/{publication}', [PublicationController::class, 'show'])->name('publications.show');

Route::post('publications/{publication}/approved', [PublicationController::class, 'approved'])->name('publications.approved');

Route::get('publications/{publication}/observation', [PublicationController::class, 'observation'])->name('publications.observation');

Route::post('publications/{publication}/reject', [PublicationController::class, 'reject'])->name('publications.reject');
