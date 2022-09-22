<?php

use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
    //Route::get('/task', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\Taskcontroller@index']);
});
Route::group(['middleware' => 'auth'], function () {
	//Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
    Route::get('/task', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\Taskcontroller@index']);
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


// task Controller
//Route::get('/tasks', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\Taskcontroller@index']);
Route::post('/post-sortable',[TaskController::class,'update']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('tasks', 'TaskController@index')->name('tasks.index');
    Route::post('tasks', 'TaskController@store')->name('tasks.store');
    Route::put('tasks/sync', 'TaskController@sync')->name('tasks.sync');
    Route::put('tasks/{task}', 'TaskController@update')->name('tasks.update');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('statuses', 'StatusController@store')->name('statuses.store');
    Route::put('statuses', 'StatusController@update')->name('statuses.update');
});


