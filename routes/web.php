<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
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
Route::get('/posts', [TestController::class, 'index']);

// POST CREATE PAGE
Route::get('/posts/create', [TestController::class, 'create']);
// POST UPDATE PAGE
Route::get('/posts/update', [TestController::class, 'update']);
// POST DELETE PAGE
Route::get('/posts/delete', [TestController::class, 'delete']);
// POST FIRST OR CREATE, TOPIB CHIQARISH TOPOLMASA CREATE QILISH
Route::get('/posts/first-or-create', [TestController::class, 'firstOrCreate']);
// POST UPDATE OR UPDATE, TOPIB UPDATE QILISH TOPOLMASA CREATE QILISH
Route::get('/posts/update-or-create', [TestController::class, 'updateOrCreate']);


Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');

# POST CRUD SYSTEM
# POST INDEX
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
# POST INDEX

# POST CREATE
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
# POST CREATE
# POST STORE --> formada kelgan malumotlarni yig'ib bazaga yuborish
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
# POST STORE

# DELETED POSTS
Route::get('/posts/deleted-posts', [PostController::class, 'deletedPosts'])->name('post.deletedPosts');
# DELETED POSTS
# DELETED POSTS RESTORE
Route::get('/posts/restore-post/{post}', [PostController::class, 'restoreDeletedPost'])->name('post.restorePost');
# DELETED POSTS RESTORE
# RESTORE ALL POST
Route::get('/posts/restore-all-post/', [PostController::class, 'restoreAllPost'])->name('post.restoreAllPost');
# RESTORE ALL POST

# POST VIEW --> DB DAGI BARCHA MALUMOTLARNI VIEWDA CHIQARISH
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
# POST VIEW

# POST EDIT
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
# POST EDIT
# POST DELETE
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');
# POST DELETE


//Route::resource([
//    'photos' => PhotoController::class,
//]);
