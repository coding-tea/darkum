<?php

use App\Http\Controllers\Afficherformulaire;
use App\Http\Controllers\CalculatriceController;
use App\Http\Controllers\Inscription;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TretmentControllers;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/*==================TP3========================= */
//Exercice 1 :
//-------Affichage des class controllers:

//static
Route::view("/", "auth.login");
Route::view("test", "layouts.landingPage");

Route::group(['prefix' => 'user'], function() {
    Route::view("/", "pages.index");
    Route::resource('/posts', PostController::class);
    Route::resource('/profile', UserController::class);
});

Route::group(['prefix' => 'admin'] , function(){
    //admin
});

?>