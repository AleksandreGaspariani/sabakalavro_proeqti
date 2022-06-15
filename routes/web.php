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

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/movie/show/{id}', [MovieController::class, 'show'])->name('showMovie');
Route::get('/session/order/{id}', [OrderController::class, 'show'])->name('order_seats');

//Authorized user routes.
Route::group(['middleware' => 'auth'],function (){

    Route::get('add/card', [CardController::class, 'create']);
    Route::post('/store-card',[CardController::class, 'store']);
    Route::get('ticket/movie/{id}', [SessionController::class, 'show'])->name('movie_sessions');

//Admin user routes.
    Route::group(['middleware' => 'admin'],function (){
//      Sectors
        Route::get('/sectors/delete/{id}',[SectorController::class, 'destroy']);
        Route::get('/sectors', [SectorController::class, 'index'])->name('sectors');
        Route::get('/sector/add' , [SectorController::class, 'create'])->name('add_sector');
        Route::post('/add-sector', [SectorController::class, 'store']);
        Route::get('/sectors/edit/{id}', [SectorController::class, 'edit']);
        Route::post('/update-sector/{id}', [SectorController::class, 'update'])->name('update_sector');

//      Movies
        Route::get('/movies', [MovieController::class, 'index'])->name('movies');
        Route::get('/movie/add', [MovieController::class, 'create']);
        Route::get('/store_movie', [MovieController::class, 'store']);
        Route::get('/movie/edit/{id}', [MovieController::class, 'edit']);
        Route::get('/movie/delete/{id}', [MovieController::class, 'destroy']);
        Route::get('/movie/update/{id}', [MovieController::class, 'update']);
        Route::get('/addCategories/{id}', [MovieController::class, 'addCategory']);
        Route::post('/store_category/{id}', [MovieController::class, 'storeCategory']);
        Route::get('/delete_category/{id}', [MovieController::class, 'deleteCategory']);
//        Sessions
        Route::get('/sessions', [SessionController::class, 'index'])->name('sessions_list');
        Route::get('/session/add', [SessionController::class, 'create'])->name('add_session');
        Route::get('/session/store', [SessionController::class, 'store']);
        Route::get('/session/edit/{id}', [SessionController::class, 'edit']);
        Route::post('/session/delete/{id}', [SessionController::class, 'destroy']);
        Route::post('/session/update/{id}', [SessionController::class, 'update']);
        Route::get('/sessions/getSessions',[SessionController::class, 'AjaxDateFilter']);

    });
});

//



