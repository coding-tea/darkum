<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\favorit;
use App\Http\Controllers\Inscription;
use App\Http\Controllers\TretmentControllers;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AdminUsersComponent;
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

Route::get("/contact/{typeL?}/{email?}/{message?}", function($typeL = null,$email = null, $message = null){
  // dd($message, $typeL, $email);
  if(isset($message) && isset($email) && isset($typeL))
  {
    
    return view("pages.landing_page.contact", compact('message', 'email', 'typeL'));
  }
    
  return view("pages.landing_page.contact");
})->name('contact');

Route::get('user/announces/{announce}', [AnnounceController::class, 'show'])->name('show');
Route::get('/create', [AnnounceController::class, 'create'])->name('announces.create')->middleware('auth');

//dashboard
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
  Route::get("/", [AnnounceController::class, 'index'])->name('user.index');
  Route::group(['prefix' => 'announces'], function () {
    Route::get('/', [AnnounceController::class, 'index'])->name('announces.index');
    // Route::get('/create', [AnnounceController::class, 'create'])->name('announces.create');
    Route::post('/', [AnnounceController::class, 'store'])->name('announces.store');
    Route::get('/{announce}/edit', [AnnounceController::class, 'edit'])->name('announces.edit');
    Route::put('/{announce}', [AnnounceController::class, 'update'])->name('announces.update');
    Route::delete('/{announce}', [AnnounceController::class, 'destroy'])->name('announces.destroy');
  });

  Route::get('/favorit', [favorit::class, 'index'])->name('favorit.index');
  Route::delete('/favorit/{AnnounceId}', [favorit::class, 'remove'])->name('favorit.remove');

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
Route::get("/index", [AnnounceController::class, "filterIndex"])->name("filterIndex");






Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){

  Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
  Route::resource('users',AdminUserController::class);
  Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

  Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
  Route::delete('countries_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('countries.mass_destroy');
  Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
  Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');
  Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
  Route::delete('rooms_mass_destroy', [\App\Http\Controllers\Admin\RoomController::class, 'massDestroy'])->name('rooms.mass_destroy');
  Route::resource('customers', \App\Http\Controllers\Admin\CustomerController::class);
  Route::delete('customers_mass_destroy', [\App\Http\Controllers\Admin\CustomerController::class, 'massDestroy'])->name('customers.mass_destroy');
  Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class);
  Route::delete('bookings_mass_destroy', [\App\Http\Controllers\Admin\BookingController::class, 'massDestroy'])->name('bookings.mass_destroy');

  Route::get('find_rooms', [\App\Http\Controllers\Admin\FindRoomController::class, 'index'])->name('find_rooms.index');
  Route::post('find_rooms', [\App\Http\Controllers\Admin\FindRoomController::class, 'index']);

  Route::get('system_calendars', [\App\Http\Controllers\Admin\SystemCalendarController::class, 'index'])->name('system_calendars.index');

});