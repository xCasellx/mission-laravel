<?php

use Illuminate\Support\Facades\Route;
Route::get("/location/country","Location\\CountryController@index");
Route::get("/location/region/{id}","Location\\RegionController@index");
Route::get("/location/city/{id}","Location\\CytiController@index");
Route::get("/location/{id}","Location\\CytiController@getFullLocation");


Route::group(['middleware' => 'auth'], function () {
    Route::post('/edit', 'UpdateUserController@editData')->name("edit");
    Route::post('/edit/password', 'UpdateUserController@editPassword')->name("edit.password");
    Route::post('/edit/image', 'UpdateUserController@editImage')->name("edit.image");
    Route::post('/comment/create', 'CommentsController@create')->name("comment.create");
    Route::post('/comment/edit', 'CommentsController@update')->name("comment.edit");


    Route::get('/', 'CabinetController@index')->name("home");
    //Route::get('/test', 'CommentsController@test')->name("test");
    Route::get('/edit', 'UpdateUserController@index')->name("edit");
    Route::get('/cabinet', 'CabinetController@index')->name("cabinet");
    Route::get('/comments', 'CommentsController@index')->name("comments");
    Route::get('/comment/delete/{id}', 'CommentsController@delete')->name("comments.delete");
    Route::get('/logout', function () {
        Auth::logout();
        return Redirect::route('login');
    })->name("logout");
});

Auth::routes(['verify' => true]);
Auth::routes();


