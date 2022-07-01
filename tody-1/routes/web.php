<?php

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
Route::get('/open_profile','Controller@open_profile_fun');
Route::get('/open_home','Controller@open_home_fun');
Route::get('/signup_user','Controller@signup_user_fun');
Route::get('/login_user','Controller@login_user_fun');
Route::get('/add_task','Controller@add_task_fun');
Route::get('/task_done','Controller@task_done_fun');
Route::get('/task_undone','Controller@task_undone_fun');
Route::get('/task_remove','Controller@task_remove_fun');
Route::get('/hide','Controller@hide_fun');
Route::get('/save_profile_update','Controller@save_profile_update_fun');

