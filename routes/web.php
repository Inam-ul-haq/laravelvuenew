<?php

Route::get('/{any}', function () {
    return view('post');
})->where('any', '.*');

Route::post('/create', 'PostController@store');
//Route::get('/posts', 'PostController@index');
//Route::get('/postslist', 'PostController@index');
