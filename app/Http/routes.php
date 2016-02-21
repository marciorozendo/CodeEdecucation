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
    Route::put('/client/{id}',     ['as' => 'client_update', 'uses' => 'ClientController@update']);
    Route::delete('/client/{id}',   ['as' => 'client_destroy', 'uses' => 'ClientController@destroy']);

    Route::get('/project',           ['as' => 'project_index', 'uses' => 'ProjectController@index']);
    Route::post('/project',          ['as' => 'project_store', 'uses' => 'ProjectController@store']);
    Route::get('/project/{id}',      ['as' => 'project_show', 'uses' => 'ProjectController@show']);
    Route::put('/project/{id}',     ['as' => 'project_update', 'uses' => 'ProjectController@update']);
    Route::delete('/project/{id}',   ['as' => 'project_destroy', 'uses' => 'ProjectController@destroy']);

    Route::get('project/notes/{id}',            ['as' => 'project_note_index', 'uses' => 'ProjectNoteController@index']);
    Route::post('/notes',                       ['as' => 'project_note_store', 'uses' => 'ProjectNoteController@store']);
    Route::get('/project/{id}/note/{noteId}',   ['as' => 'project_note_show', 'uses' => 'ProjectNoteController@show']);
    Route::put('/notes/{id}',                  ['as' => 'project_note_update', 'uses' => 'ProjectNoteController@update']);
    Route::delete('/notes/{id}',                ['as' => 'project_note_destroy', 'uses' => 'ProjectNoteController@destroy']);


});
