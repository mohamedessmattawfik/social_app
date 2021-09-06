<?php

//use App\Http\Controllers\EditProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomePageController;
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

//Route::get('/home/{id}', [HomePageController::class, 'index']);
//
//Route::get('/hello', function () {
//    return 'Hello world!';
//});
//
//Route::get('/users/{id?}', function ($id = 'No Id provided') {
//    return 'user id is : ' . $id;
//});
//
//Route::get('/view', function () {
//    return view('child');
//});
//
Route::get('/', function () {
    return view('welcome', [
        'name' => 'Mustafa'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
    Route::post('/posts/create', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.create');
    Route::post('/posts/{post_id}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.create');
    Route::post('/test' , [\App\Http\Controllers\EditProfileController::class , 'edit']) ->name('edit_profile');
    Route::post('/posts/{post_id}/likes',[\App\Http\Controllers\LikeController::class , 'store']) ->name('likes.create') ;
    Route::post('/posts/{post_id}/dislikes',[\App\Http\Controllers\LikeController::class , 'distroy']) ->name('dislikes.create');
    Route::get('/posts/{post_id}',[\App\Http\Controllers\UserProfileController::class,'index'])->name('show_profile');
    Route::get('/UserProfile/{post_id}',[\App\Http\Controllers\UserProfileController::class ,'show_profile'])->name('user.profile');

//    Route::post('/posts/{post_id}',[\App\Http\Controllers\LikeController::class , 'distroy']) ->name('dsilikes.create');
});

Route::get('test', function () {
   return view('auth.edit');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('/posts/{post_id}',[\App\Http\Controllers\LikeController::class , 'store'])->name('likes.create');

Auth::routes();

Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
