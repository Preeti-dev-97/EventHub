<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
  
Route::get('events', [EventController::class, 'index'])->name('events.index');
Route::get('events/create', [EventController::class, 'create'])->name('events.create');
Route::post('events/create', [EventController::class, 'store'])->name('events.store');
Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::post('events/{event}/edit', [EventController::class, 'update'])->name('events.update');
Route::get('/events/{event}/delete', [EventController::class,'delete'])->name('events.delete');

Route::get('/events/upload', [EventController::class,'upload'])->name('events.upload');
Route::post('/events/import', [EventController::class,'import'])->name('events.import');
