<?php

use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Inscription;
use App\Http\Controllers\TretmentControllers;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//static
Route::view("/", "pages.landing_page.index");
Route::view("/location", "pages.landing_page.location");
Route::view("/about", "pages.landing_page.about");
Route::view("/privacy", "pages.landing_page.condition");
Route::view("/contact", "pages.landing_page.contact");
Route::view("/home", "pages.landing_page.index");

Route::get('user/announces/{announce}', [AnnounceController::class, 'show'])->name('show');

//dashboard
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {

    Route::get("/", [AnnounceController::class, 'index']);

    Route::group(['prefix' => 'announces'], function(){
        Route::get('/', [AnnounceController::class, 'index'])->name('announces.index');
        Route::post('user/announces', [AnnounceController::class, 'store'])->name('announces.store');
        Route::post('user/announces/create', [AnnounceController::class, 'create'])->name('announces.create');
        Route::get('user/announces/{announce}/edit', [AnnounceController::class, 'edit'])->name('announces.edit');
        Route::put('user/announces/{announce}', [AnnounceController::class, 'update'])->name('announces.update');
        Route::delete('user/announces/{announce}', [AnnounceController::class, 'destroy'])->name('announces.destroy');
    });
    
    // Route::resource('/announces', AnnounceController::class);
    Route::resource('/profile', UserController::class);
    Route::post('/comment', [CommentController::class, 'store'])->name('comment');
    Route::get('/comments/{id}', [CommentController::class, 'index'])->name('comments');
    Route::post('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('deleteC');
});

//landing Page
Route::get("/location", [AnnounceController::class, "allAnnonces"])->name("location");
Route::get("/vente", [AnnounceController::class, "allAnnonces"])->name("vente");

?>
