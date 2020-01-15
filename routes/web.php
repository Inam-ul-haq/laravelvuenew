<?php

Route::get('/{any}', function () {
    return view('post');
})->where('any', '.*');

Route::post('/create', 'PostController@store');
