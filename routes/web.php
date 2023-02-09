<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Route 1
Route::controller(UserController::class)
    ->prefix('admin')
    ->middleware(['auth', 'role:superadmin'])
    ->group(function () {
        Route::get('/user', 'index');
        Route::get('/user/create', 'create');
        Route::get('/user/edit/{id}', 'edit');
        Route::post('/user', 'store');
        Route::put('user/{id}', 'update');
        Route::delete('/user/{id}', 'destroy');
    });

// Route 2
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:superadmin'])
    ->group(function () {
        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);
    });

//EXAMPLE

// Route::name('admin.')
//     ->prefix('admin')
//     // ->namespace('Admin')
//     ->middleware(['auth', 'role:superadmin'])
//     ->group(function () {
//         Route::resource('user','App\Http\Controllers\Admin\UserController');
//         // Route::resource('user', 'UserController');
//         // Route::resource('permission', 'PermissionController');
//         // Route::resource('role', 'RoleController');
//     });

// Route::resource('article', 'ArticleController');

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/user', [UserController::class, 'index'])->prefix('admin')->middleware(['auth', 'role:user']);
