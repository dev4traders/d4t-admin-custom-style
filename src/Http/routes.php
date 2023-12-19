<?php

use Illuminate\Support\Facades\Route;
use D4T\Admin\CustomStyle\ServiceProvider;
use D4T\Admin\CustomStyle\Http\Controllers\CustomStyleController;

Route::get(ServiceProvider::URL_CUSTOM_STYLE, CustomStyleController::class.'@index')->name(ServiceProvider::URL_CUSTOM_STYLE);
Route::post(ServiceProvider::URL_CUSTOM_STYLE.'/save', CustomStyleController::class.'@save');