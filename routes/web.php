<?php

use App\Http\Controllers\Category\CategoryDestroyController;
use App\Http\Controllers\Category\CategoryEditController;
use App\Http\Controllers\Category\CategoryIndexController;
use App\Http\Controllers\Category\CategoryPositionController;
use App\Http\Controllers\Category\CategoryStoryController;
use App\Http\Controllers\Category\CategoryUpdateController;
use App\Http\Controllers\Category\CategoryUpdatePositionController;
use App\Http\Controllers\CategoryController;
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

Route::middleware(['web'])->group(function () {
    Route::get('/', [CategoryIndexController::class, 'index']);
    Route::post('/categories', [CategoryStoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [CategoryDestroyController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/edit/{category}', [CategoryEditController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{category}', [CategoryUpdateController::class, 'update'])->name('categories.update');
    Route::get('/categories/edit/position/{category}', [CategoryPositionController::class, 'position'])->name('categories.position');
    Route::put('/categories/update/position/{category}', [CategoryUpdatePositionController::class, 'updatePosition'])->name('categories.updatePosition');
});
