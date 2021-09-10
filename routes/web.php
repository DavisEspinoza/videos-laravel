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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Rutas de controlador de video

Route::get('crear-video',array(
    'as'=>'createVideo',
    'middleware' => 'auth',
    'uses' => 'videoController@createVideo'
));

Route::post('guardar-video',array(
    'as'=>'saveVideo',
    'middleware' => 'auth',
    'uses' => 'videoController@saveVideo'
));

Route::get('miniatura/{filename}',array(
    'as'=>'imageVideo',
    'uses' => 'videoController@getImage'
));

Route::get('video/{video_id}',array(
    'as'=>'detailVideo',
    'uses' => 'videoController@getVideoPage'
));

Route::get('video-file/{filename}',array(
    'as'=>'videoFile',
    'uses' => 'videoController@getVideo'
));

Route::get('delete-video/{video_id}',array(
    'as'=>'deleteVideo',
    'middleware' => 'auth',
    'uses' => 'VideoController@delete'
));

Route::get('editar-video/{video_id}',array(
    'as'=>'editVideo',
    'middleware' => 'auth',
    'uses' => 'videoController@edit'
));

Route::post('update-video/{video_id}',array(
    'as'=>'updateVideo',
    'middleware' => 'auth',
    'uses' => 'videoController@update'
));

Route::get('buscar/{search?}/{filter?}',array(
    'as'=>'videoSearch',
    'uses'=>'VideoController@search'
));

//Comentarios

Route::post('comment',array(
    'as'=>'comment',
    'middleware' => 'auth',
    'uses' => 'CommentController@store'
));

Route::get('delete-comment/{comment_id}',array(
    'as'=>'deleteComment',
    'middleware' => 'auth',
    'uses' => 'CommentController@delete'
));
//usuarios
Route::get('canal/{user_id}',array(
    'as'=>'channel',
    'uses'=>'userController@channel'
));

//cache

Route::get('clear-cache',function (){
    $code = Artisan::call('cache:clear');
});
