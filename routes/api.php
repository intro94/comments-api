<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/comments', 'CommentController@list');

Route::post('/comments/{id?}', 'CommentController@create');

Route::delete('/comments/{id}', 'CommentController@delete');

Route::patch('/comments/{id}', 'CommentController@update');
