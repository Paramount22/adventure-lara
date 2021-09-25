<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DudeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [DudeController::class, 'index']);
//Route::view('/', 'welcome');

Route::get('dudes/{dude}', [DudeController::class, 'show'])->name('dude.show');

Route::get('user/{user}', [UserController::class, 'show'])->name('show.user');
Route::get('tag/{tag}', [TagController::class, 'show'])->name('show.tag');

Route::middleware(['auth'])->group(function () {
    /*DUDES*/
    Route::get('add', [DudeController::class, 'create'])->name('dude.create');
    Route::post('add', [DudeController::class, 'store'])->name('dude.store');
    Route::get('dudes/{dudes}/edit', [DudeController::class, 'edit'])->name('dude.edit');
    Route::put('dudes/{dudes}', [DudeController::class, 'update'])->name('dude.update');
    Route::get('dudes/{dudes}/delete',[DudeController::class, 'delete'])->name('dude.delete');
    Route::delete('dudes/{dudes}',[DudeController::class, 'destroy'])->name('dude.destroy');

    /*Comments*/
    Route::post('comments/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('comment/{comment}/delete', [CommentController::class, 'destroy'])->name('comment.destroy'); // delete
    // comment
    Route::put('comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
