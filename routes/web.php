<?php

Route::get('/', function () {

    return view('backend.index');


})->where('any', '.*');

Route::get('/{any}', function ($any) {

    return view('backend.index');


})->where('any', '.*');