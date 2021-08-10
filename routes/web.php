<?php

use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MemeCreatorController;
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

Route::get('/', [PageController::class, 'index']);
// Route::get('/',function(){
//     return  view('index');
// });
Route::group(['middleware' => 'auth'], function () {
    Route::get('/upload', function () {
        return view('upload.index');
    });
    Route::get('/upload/obrazek', function () {
        return view('upload.picture');
    });
    Route::get('/upload/filmik', function () {
        return view('upload.video');
    });
    Route::post('/upload/obrazek', [MemeController::class, 'store']);

    Route::post('/vote', [VoteController::class, 'vote']);

    Route::post('/{articleID}/vote/{commentID}', [VoteController::class, 'commentVote']);

    Route::post('/{articleID}/comment/', [CommentController::class, 'store']);

    Route::post('/un_vote', [VoteController::class, 'unVote']);

    Route::get('/uzytkownik/ustawienia', [ProfilController::class, 'setting']);

    Route::post('/user/info', [ProfilController::class, 'userInfoUpdate']);

    Route::post('/user/password-change', [NewPasswordController::class, 'store']);

    Route::post('/user/avatar', [ProfilController::class, 'avatarUpdate']);
});

Route::get('/uzytkownik/{userName}/kategoria/{categoryName}',[ProfilController::class, 'category']);

Route::get('/kategoria/{categoryName}', [PageController::class, 'categoryShow']);

Route::get('/obr/{memeID}/{memeTitle}', [MemeController::class, 'show']);

Route::get('/oczekujace', [PageController::class, 'new']);

Route::get('/createMeme', [MemeCreatorController::class, 'createMeme']);

Route::get('/losowe', [PageController::class, 'random']);

Route::get('/top', [PageController::class, 'top']);

Route::get('/create', [CreateAdminController::class, 'create']);

Route::get('/uzytkownik/{userName}', [ProfilController::class, 'show']);

Route::get('/uzytkownik/{userName}/komentarze', [ProfilController::class, 'comments']);

require __DIR__ . '/auth.php';
