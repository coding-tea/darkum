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
Route::view("/", "pages.landing_page.index")->name("home");
Route::view("/location", "pages.landing_page.location");
Route::view("/about", "pages.landing_page.about");
Route::view("/privacy", "pages.landing_page.condition");
Route::view("/contact", "pages.landing_page.contact");

Route::get('user/announces/{announce}', [AnnounceController::class, 'show'])->name('show');
Route::view('/create', 'pages.user.announces.create')->name('announces.create')->middleware('auth');

//dashboard
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {

    Route::get("/", [AnnounceController::class, 'index']);

    Route::group(['prefix' => 'announces'], function(){
        Route::get('/', [AnnounceController::class, 'index'])->name('announces.index');

        
        // Route::get('/create', [AnnounceController::class, 'create'])->name('announces.create');
        Route::post('/', [AnnounceController::class, 'store'])->name('announces.store');

        Route::get('/{announce}/edit', [AnnounceController::class, 'edit'])->name('announces.edit');
        Route::put('/{announce}', [AnnounceController::class, 'update'])->name('announces.update');

        Route::delete('/{announce}', [AnnounceController::class, 'destroy'])->name('announces.destroy');
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
Route::get("/vacance", [AnnounceController::class, "allAnnonces"])->name("vacance");
Route::post("/location", [AnnounceController::class, "filterSearch"])->name("filterAnnonce");
Route::post("/vente", [AnnounceController::class, "filterSearch"])->name("filterAnnonceVente");
Route::post("/vacance", [AnnounceController::class, "filterSearch"])->name("filterAnnonceVacance");
