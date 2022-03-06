<?php

use App\Http\Controllers\Editor\PublicationController;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'editor/publications');

Route::resource('publications', PublicationController::class)->names('publications');

Route::post('publications/{publication}/status', [publicationController::class, 'status'])->name('publications.status');

Route::get('publications/{publication}/check', [publicationController::class, 'check'])->name('publications.check');

/*Route::get('publications/{publication}/curriculum', publicationsCurriculum::class)->middleware('can:Actualizar cursos')->name('publications.curriculum');

*/
