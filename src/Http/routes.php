<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use D4T\Admin\CustomStyle\Http\Controllers\CustomStyleController;

Route::group([
    'middleware'    => config('admin.route.middleware')
], function (Router $router) {
    $router->get('custom-style', CustomStyleController::class.'@index')->name('custom_style');
    $router->post('custom-style/save', CustomStyleController::class.'@save');
});
