<?php

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

Route::get('/home', 'HomeController@index');

Route::get('/api', 'TimesheetController@getTime');

Route::get('/dashboard/users', 'UsersController@index')->name('get.users');
Route::post('/dashboard/users/create', 'UsersController@create')->name('create.user');
Route::get('/api/v1/users', 'UsersController@usersApi');
Route::get('/api/v1/users/detail/{id}', 'UsersController@detailApi');
Route::get('/dashboard/user/detail/{id}', 'UsersController@detail')->name('get.user.detail');

/*
 * Companies
 */
 Route::get('/dashboard/companies', 'CompaniesController@index')->name('get.companies');
 Route::get('/api/v1/companies', 'CompaniesController@companiesApi');
 Route::post('/dashboard/company/create', 'CompaniesController@create')->name('create.company');

/*
 * Projects
 */
 Route::get('/dashboard/projects', 'ProjectsController@index')->name('get.projects');
 Route::get('/api/v1/projects', 'ProjectsController@projectsApi');
 Route::post('/dashboard/project/create', 'ProjectsController@create')->name('create.project');
