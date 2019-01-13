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



Route::get('/', 'PagesController@home');


// Admin authentication
Route::get('/admin/', 'AdminUsersController@admin_login')->name('login');
Route::get('/admin/login', 'AdminUsersController@admin_login')->name('login');
Route::post('/admin/login', 'AdminUsersController@admin_loginPost');
Route::get('/admin/logout', 'AdminUsersController@admin_logout');

Route::post('/queries/create', 'QueriesController@create');
Route::match(array('GET', 'POST'), '/queries/unsub', 'QueriesController@unsub');

//Admin section protected by middleware auth
Route::group(['middleware' => 'App\Http\Middleware\Admin'], function()
{
    // Admin-users block
    Route::get('/admin/admin-users', 'AdminUsersController@admin_index');
    Route::get('/admin/admin-users/create', 'AdminUsersController@admin_createShow');
    Route::post('/admin/admin-users/create', 'AdminUsersController@admin_create');
    Route::get('/admin/admin-users/generate-random-password', 'AdminUsersController@generatePassword');
    Route::get('/admin/admin-users/delete/{admin}', 'AdminUsersController@admin_deleteShow');
    Route::post('/admin/admin-users/delete/{admin}', 'AdminUsersController@admin_delete');
    Route::get('/admin/admin-users/edit/{admin}', 'AdminUsersController@admin_editShow');
    Route::post('/admin/admin-users/edit/{admin}', 'AdminUsersController@admin_edit');

    // Users block
    Route::get('/admin/users', 'UsersController@admin_index');
    Route::get('/admin/users/create', 'UsersController@admin_createShow');
    Route::post('/admin/users/create', 'UsersController@admin_create');
    Route::get('/admin/users/delete/{user}', 'UsersController@admin_deleteShow');
    Route::post('/admin/users/delete/{user}', 'UsersController@admin_delete');
    Route::get('/admin/users/edit/{user}', 'UsersController@admin_editShow');
    Route::post('/admin/users/edit/{user}', 'UsersController@admin_edit');

    // Categories
    Route::get('/admin/categories', 'CategoriesController@admin_index');
    Route::get('/admin/categories/create', 'CategoriesController@admin_createShow');
    Route::post('/admin/categories/create', 'CategoriesController@admin_create');
    Route::get('/admin/categories/delete/{categories}', 'CategoriesController@admin_deleteShow');
    Route::post('/admin/categories/delete/{categories}', 'CategoriesController@admin_delete');
    Route::get('/admin/categories/edit/{categories}', 'CategoriesController@admin_editShow');
    Route::post('/admin/categories/edit/{categories}', 'CategoriesController@admin_edit');

    // Tags
    Route::get('/admin/tags', 'TagsController@admin_index');
    Route::get('/admin/tags/create', 'TagsController@admin_createShow');
    Route::post('/admin/tags/create', 'TagsController@admin_create');
    Route::get('/admin/tags/delete/{tags}', 'TagsController@admin_deleteShow');
    Route::post('/admin/tags/delete/{tags}', 'TagsController@admin_delete');
    Route::get('/admin/tags/edit/{tags}', 'TagsController@admin_editShow');
    Route::post('/admin/tags/edit/{tags}', 'TagsController@admin_edit');

    // News
    Route::get('/admin/news', 'NewsController@admin_index');
    Route::get('/admin/news/create', 'NewsController@admin_createShow');
    Route::post('/admin/news/create', 'NewsController@admin_create');
    Route::get('/admin/news/delete/{news}', 'NewsController@admin_deleteShow');
    Route::post('/admin/news/delete/{news}', 'NewsController@admin_delete');
    Route::get('/admin/news/edit/{news}', 'NewsController@admin_editShow');
    Route::post('/admin/news/edit/{news}', 'NewsController@admin_edit');

    // News Images
    Route::get('/admin/news-images/{news}', 'NewsImagesController@admin_index');
    Route::get('/admin/news-images/{news}/create', 'NewsImagesController@admin_createShow');
    Route::post('/admin/news-images/{news}/create', 'NewsImagesController@admin_create');
    Route::get('/admin/news-images/{news}/delete/{images}', 'NewsImagesController@admin_deleteShow');
    Route::post('/admin/news-images/{news}/delete/{images}', 'NewsImagesController@admin_delete');
    Route::get('/admin/news-images/{news}/edit/{images}', 'NewsImagesController@admin_editShow');
    Route::post('/admin/news-images/{news}/edit/{images}', 'NewsImagesController@admin_edit');
    Route::get('/admin/news-images/{news}/download/{images}', 'NewsImagesController@admin_download');
    Route::get('/admin/news-images/{news}/sort/{direction}/{images}/{sort}', 'NewsImagesController@admin_sort');

    // Queries
    Route::get('/admin/queries', 'QueriesController@admin_index');
    Route::get('/admin/queries/delete/{queries}', 'QueriesController@admin_deleteShow');
    Route::post('/admin/queries/delete/{queries}', 'QueriesController@admin_delete');
    Route::get('/admin/queries/download', 'QueriesController@admin_download');
});

Auth::routes();
Route::get('/home', 'HomeController@index');



