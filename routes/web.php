<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


// Controllers
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Auth;
//
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/movie/show/{id}', [MovieController::class, 'show'])->name('showMovie');
// admin controller

Route::group(['middleware' => 'auth'],function (){

    Route::get('add/card', [CardController::class, 'create']);
    Route::post('/store-card',[CardController::class, 'store']);

    Route::get('sessions/{id}', [SessionController::class, 'show'])->name('see_session');

    Route::group(['middleware' => 'admin'],function (){

        Route::get('/sectors/delete/{id}',[SectorController::class, 'destroy']);
        Route::get('/sectors', [SectorController::class, 'index'])->name('sectors');
        Route::get('/sector/add' , [SectorController::class, 'create'])->name('add_sector');
        Route::post('/add-sector', [SectorController::class, 'store']);
        Route::get('/sectors/edit/{id}', [SectorController::class, 'edit']);
        Route::post('/update-sector/{id}', [SectorController::class, 'update'])->name('update_sector');

        Route::get('/movies', [MovieController::class, 'index'])->name('movies');
        Route::get('/movie/add', [MovieController::class, 'create']);
        Route::get('/store_movie', [MovieController::class, 'store']);
        Route::get('/movie/edit/{id}', [MovieController::class, 'edit']);
        Route::get('/movie/delete/{id}', [MovieController::class, 'destroy']);
        Route::get('/movie/update/{id}', [MovieController::class, 'update']);
        Route::get('/addCategories/{id}', [MovieController::class, 'addCategory']);
        Route::post('/store_category/{id}', [MovieController::class, 'storeCategory']);
        Route::get('/delete_category/{id}', [MovieController::class, 'deleteCategory']);
    });
});

//



