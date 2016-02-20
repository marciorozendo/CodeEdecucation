<?php


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/client',           ['as' => 'client_index', 'uses' => 'ClientController@index']);
    Route::post('/client',          ['as' => 'client_store', 'uses' => 'ClientController@store']);
    Route::get('/client/{id}',      ['as' => 'client_show', 'uses' => 'ClientController@show']);
    Route::delete('/client/{id}',   ['as' => 'client_destroy', 'uses' => 'ClientController@destroy']);

});
