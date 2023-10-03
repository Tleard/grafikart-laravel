<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');

    /*Route::get('/{slug}-{post}', [BlogController::class, 'show'])->where([
        'id' => '[0-9]*',
        'slug' => '[a-z0-9\-]*'
    ])->name('show');*/

    Route::get('/new', [BlogController::class, 'create'])->name('create');
    Route::post('/new', [BlogController::class, 'store']);
    Route::get('/{post:slug}', [BlogController::class, 'show'])->where([
        'post' => '[a-z0-9\-]*'
    ])->name('show');

});

