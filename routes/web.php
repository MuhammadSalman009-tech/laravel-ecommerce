<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/redirect', function(){
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // you don't need else here as you are already returning
    // if the previous condition is true
    if(Auth::user()->is_admin==1) {
        return redirect('/admin/dashboard');
    }

    return redirect('/home'); // change to the regular user home page
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin routes
Route::group(['prefix' => 'admin','middleware'=>["auth","is_admin"]], function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::resource('categories', CategoryController::class);
});
