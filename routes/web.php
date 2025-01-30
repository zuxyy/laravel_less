<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
});

// POST INDEX
Route::get('/posts', [PostsController::class, 'index']);

// POST CREATE PAGE
Route::get('/posts/create', [PostsController::class, 'create']);
// POST UPDATE PAGE
Route::get('/posts/update', [PostsController::class, 'update']);
// POST DELETE PAGE
Route::get('/posts/delete', [PostsController::class, 'delete']);
// POST FIRST OR CREATE, TOPIB CHIQARISH TOPOLMASA CREATE QILISH
Route::get('/posts/first-or-create', [PostsController::class, 'firstOrCreate']);
// POST UPDATE OR UPDATE, TOPIB UPDATE QILISH TOPOLMASA CREATE QILISH
Route::get('/posts/update-or-create', [PostsController::class, 'updateOrCreate']);


Route::get('/about', [Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [Controllers\ContactsController::class, 'index'])->name('contact.index');
Route::get('/main', [Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/post', [Controllers\PostController::class, 'index'])->name('post.index');
