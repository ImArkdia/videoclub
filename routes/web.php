<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'getHome']);
    Route::get('/catalog', [CatalogController::class, 'getIndex']);
    Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow']);
    Route::get('/catalog/create', [CatalogController::class, 'getCreate']);
    Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit']);
    Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit']);
    Route::post('/catalog/create', [CatalogController::class, 'postCreate']);
    Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit']);
    Route::get('/catalog/alquilar/{id}', [CatalogController::class, 'getAlquilar']);
    Route::get('/catalog/devolver/{id}', [CatalogController::class, 'getDevolver']);
});

require __DIR__.'/auth.php';
