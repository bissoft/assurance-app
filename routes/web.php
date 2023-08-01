<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('products', ProductController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('business', BusinessController::class);
    Route::post('template/store', [BusinessController::class,'storeCustomer'])->name('template.store');
    Route::post('section/store', [BusinessController::class,'storeSection'])->name('section.store');
    Route::resource('custom-field', CustomFieldController::class);
    Route::resource('reviews', ReviewController::class);
    Route::get('custom-field/duplicate/{id}', [CustomFieldController::class,'duplicate'])->name('custom-field.duplicate');
    Route::post('customfield-sortable', [CustomFieldController::class,'sortable'])->name('customfield-sortable');
    Route::post('team/store', [GroupController::class,'Teamstore'])->name('team.store');
    Route::delete('team/destroy/{id?}', [GroupController::class,'Teamdestroy'])->name('team.destroy');
});
