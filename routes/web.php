<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\SessionController;
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
    return view('home');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/posts', function () {
    return view('posts');
})->name('posts');

Route::resource('klub', KlubController::class) ->name('index', 'klub');

Route::get('/sesi', [SessionController::class, 'index']) ;
Route::post('/sesi/login', [SessionController::class, 'login']) ;
Route::get('/sesi/logout', [SessionController::class, 'logout']) ;