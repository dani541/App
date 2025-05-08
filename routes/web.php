<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TravelController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\TypeController;

Route::get('/', function () {
    return view('welcome');
});





Route::get('/home', [TravelController::class, 'create'])->name('home');

Route::post('/home', [TravelController::class, 'store'])->name('storeTravel');

Route::post('/travel', [TravelController::class, 'store'])->name('storeTravel');


Route::get('workers', [WorkerController::class, 'show'])->name('showWorkers');


Route::get('worker', [WorkerController::class, 'create'])->name('createW');


Route::post('worker', [WorkerController::class, 'store'])->name('storeWorker');


Route::get('/worker/{id}', [WorkerController::class, 'modify']);


Route::post('/worker/{id}', [WorkerController::class, 'edit'])->name('editWorker');




Route::get('/travel/{id}', [TravelController::class, 'modify'])->name('travelE');


Route::post('/travel/{id}', [TravelController::class, 'edit'])->name('editTravel');


Route::delete('/travel/{id}', [TravelController::class, 'delete'])->name('deleteTravel');




Route::get('/playground', [TravelController::class, 'playground'])->name('playground');


