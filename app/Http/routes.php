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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('add');
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
Route::post('oauth/access_token', function () {

    $input = Input::all();
    $request = Request::instance();
    $request->request->replace($input);
    Authorizer::setRequest($request);

    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware' => ['web', 'oauth']], function () {

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

    Route::group(['prefix' => 'project'], function () {
        Route::get('{id}/note', ['as' => 'project_note_index', 'uses' => 'ProjectNoteController@index']);
        Route::post('{id}/note', ['as' => 'project_note_store', 'uses' => 'ProjectNoteController@store']);
        Route::get('{id}/note/{noteId}', ['as' => 'project_note_show', 'uses' => 'ProjectNoteController@show']);
        Route::delete('/note/{id}', ['as' => 'project_note_destroy', 'uses' => 'ProjectNoteController@destroy']);
        Route::post('{id}/file', 'ProjectFileController@store');
    });


});
