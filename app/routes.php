<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Bind route parameters
Route::model('person', 'Person');
Route::model('group', 'Group');

// Show pages.
Route::get('/', 'PeopleController@index');
Route::get('/people', 'PeopleController@index');
Route::get('/people/create', 'PeopleController@create');
Route::get('/people/edit/{person}', 'PeopleController@edit');
Route::get('/people/delete/{person}', 'PeopleController@delete');

Route::get('/people/', 'PeopleController@search');

// Handle form submissions.
Route::post('/people/create', 'PeopleController@handleCreate');
Route::post('/people/edit', 'PeopleController@handleEdit');
Route::post('/people/delete', 'PeopleController@handleDelete');


Route::post('/people/findPerson', 'PeopleController@findPerson');


Route::get('/groups', 'GroupsController@index');
Route::get('/groups/create', 'GroupsController@create');
Route::get('/groups/edit/{group}', 'GroupsController@edit');
Route::get('/groups/delete/{group}', 'GroupsController@delete');

// Handle group form submission
Route::post('/groups/handleCreate', 'GroupsController@handleCreate');
Route::post('/groups/handleEdit', 'GroupsController@handleEdit');
