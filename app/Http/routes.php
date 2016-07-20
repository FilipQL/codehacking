<?php

    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/admin', function() {
        return view('admin.index');
    });


    Route::get('admin/users/{users}/confirm', ['as' => 'admin.users.confirm', 'uses' => 'AdminUsersController@confirm']);
    Route::resource('admin/users', 'AdminUsersController');

    Route::get('admin/categories/{categories}/confirm', ['as' => 'admin.categories.confirm', 'uses' => 'AdminCategoriesController@confirm']);
    Route::resource('admin/categories', 'AdminCategoriesController', ['except' => ['create']]);

    Route::get('admin/posts/{posts}/confirm', ['as' => 'admin.posts.confirm', 'uses' => 'AdminPostsController@confirm']);
    Route::resource('admin/posts', 'AdminPostsController');

