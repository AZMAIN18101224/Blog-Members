<?php

use App\Http\Controllers\BlogController;
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


Route::get('/', [BlogController::class, 'login']);

Route::post('/UI/login', [BlogController::class, 'getlogindata']);

// Route::get('/UI/login', [BlogController::class, 'login']);
//it will stop parsing one page to another page from the browser navigation panel
Route::get('/UI/login', function () {
    if (session()->has('username')) {
        return redirect('UI/index');
    }
    return view('UI/login');
});

Route::get('/UI/index', [BlogController::class, 'index']);

Route::get('/UI/create', [BlogController::class, 'create']);

Route::post('/blogs', [BlogController::class, 'store']);

// Route::get('/UI/index', [BlogController::class, 'show']);
Route::delete('/UI/{blog}', [BlogController::class, 'destroy']);

Route::get('/UI/{blog}/edit', [BlogController::class, 'edit']);

Route::patch('/UI/{blog}/update', [BlogController::class, 'update']);

Route::get('/UI/{blog}', [BlogController::class, 'show']);

Route::get('/UI/about', [BlogController::class, 'about']);

Route::get('/UI/contact', [BlogController::class, 'contact']);

Route::get('/UI/my', [BlogController::class, 'my']);

Route::get('/UI/noAccess', [BlogController::class, 'noAccess']);

Route::get('/logout', function () {
    if (session()->has('username')) {
        session()->pull('username');
    }
    return redirect('UI/login');
});
