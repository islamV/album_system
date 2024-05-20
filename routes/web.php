<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::resource('/albums', AlbumController::class)->middleware('auth');
Route::post('albums/{album}/upload', [AlbumController::class, 'upload'])->name('ablums.upload')->middleware('auth');
Route::post('/albums/image/move/{album}'   ,[AlbumController::class, 'move'] )->name('album.image.move') ;
Route::get('/albums/{album}/move'   ,[AlbumController::class, 'movePage'] )->name('album.image.movepage') ;
Route::delete('/albums/{album}/image/{image}', [AlbumController::class, 'destroyImage'])->name('album.image.destroy');


require __DIR__.'/auth.php';
