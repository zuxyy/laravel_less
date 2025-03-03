<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
//use App\Http\Controllers\PostController;
//use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\PostController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// POST INDEX
//Route::get('/posts', [TestController::class, 'index']);
//
//// POST CREATE PAGE
//Route::get('/posts/create', [TestController::class, 'create']);
//// POST UPDATE PAGE
//Route::get('/posts/update', [TestController::class, 'update']);
//// POST DELETE PAGE
//Route::get('/posts/delete', [TestController::class, 'delete']);
//// POST FIRST OR CREATE, TOPIB CHIQARISH TOPOLMASA CREATE QILISH
//Route::get('/posts/first-or-create', [TestController::class, 'firstOrCreate']);
//// POST UPDATE OR UPDATE, TOPIB UPDATE QILISH TOPOLMASA CREATE QILISH
//Route::get('/posts/update-or-create', [TestController::class, 'updateOrCreate']);


//Route::middleware('admin')->prefix('admin')->name('admin');
//Route::get('/admin', [PostController::class, 'index'])->name('admin');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');

# POST CRUD SYSTEM
# POST INDEX
//Route::get('/posts', [PostController::class, 'index'])->name('Post.index');
//# POST INDEX
//
//# POST CREATE
//Route::get('/posts/create', [PostController::class, 'create'])->name('Post.create');
//# POST CREATE
//# POST STORE --> formada kelgan malumotlarni yig'ib bazaga yuborish
//Route::post('/posts', [PostController::class, 'store'])->name('Post.store');
//# POST STORE
//# DELETED POSTS
//Route::get('/posts/deleted-posts', [PostController::class, 'deletedPosts'])->name('Post.deletedPosts');
//# DELETED POSTS
//# DELETED POSTS RESTORE
//Route::get('/posts/restore-Post/{Post}', [PostController::class, 'restoreDeletedPost'])->name('Post.restorePost');
//# DELETED POSTS RESTORE
//# RESTORE ALL POST
//Route::get('/posts/restore-all-Post/', [PostController::class, 'restoreAllPost'])->name('Post.restoreAllPost');
//# RESTORE ALL POST
//
//# POST VIEW --> DB DAGI BARCHA MALUMOTLARNI VIEWDA CHIQARISH
//Route::get('/posts/{Post}', [PostController::class, 'show'])->name('Post.show');
//# POST VIEW
//
//# POST EDIT
//Route::get('/posts/{Post}/edit', [PostController::class, 'edit'])->name('post.edit');
//Route::patch('/posts/{Post}', [PostController::class, 'update'])->name('post.update');
//# POST EDIT
//# POST DELETE
//Route::delete('/posts/{Post}', [PostController::class, 'destroy'])->name('Post.delete');
//# POST DELETE


//Route::controller(PostController::class)->prefix('admin')->group(function () {
//    Route::get('/', 'index')->name('post.index');
//
//    Route::controller(PostController::class)->prefix('admin')->group(function () {
//        Route::get('/', 'index')->name('post.index');
//    });
//});
//Route::prefix('admin')->name('admin.')->group(function () {
//    Route::get('/post', [PostController::class, 'index'])->name('post.index');
//});


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/posts', [\App\Http\Controllers\Admin\Post\PostController::class, 'index'])->name('post.index');
});

Route::controller(PostController::class)->prefix('posts')->group(function () {
    Route::get('/', 'index')->name('post.index');
    Route::get('/create', 'create')->name('post.create');
    Route::post('/', 'store')->name('post.store'); // BU YERGA TO'G'RILANDI ✅
    Route::get('/{post}/', 'show')->name('post.show');
    Route::get('/{post}/edit', 'edit')->name('post.edit'); // `/posts/{post}/edit` bo‘lishi uchun ✅
    Route::patch('/{post}', 'update')->name('post.update');
    Route::delete('/{post}', 'destroy')->name('post.delete');
    Route::get('/deleted-posts', 'deletedPosts')->name('post.deletedPosts'); // `/posts/deleted-posts` bo‘lishi uchun ✅
});


//Route::controller(QuestionController::class)->prefix('question')->group(function () {
//    Route::get('/', 'index')->name('question.index');
//    Route::get('/', 'show')->name('question.show');
//    Route::post('/{question}', 'store')->name('question.store');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
