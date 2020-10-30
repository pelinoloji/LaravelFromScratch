<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

// Route::get('/', function () {
//   $name = request('name');

//   return view('name', [
//     'name' => $name
//   ]);
// });

Route::get('/', function () {
  return view('welcome');
});

Route::get('/contact', function () {
  return view('contact');
});

//Route::get('/posts/{post}', [PostsController::class, 'show']); //php 8 not support => Route::get('/posts/{post}','PostsController@show');
