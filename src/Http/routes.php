<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use D4T\Admin\CustomStyle\ServiceProvider;
use D4T\Admin\CustomStyle\Http\Controllers\CustomStyleController;

Route::group([
    'middleware'    => config('admin.route.middleware')
], function (Router $router) {
    $router->get(ServiceProvider::URL_CUSTOM_STYLE, CustomStyleController::class.'@index')->name('custom_style');
    $router->post(ServiceProvider::URL_CUSTOM_STYLE.'/save', CustomStyleController::class.'@save');
});
