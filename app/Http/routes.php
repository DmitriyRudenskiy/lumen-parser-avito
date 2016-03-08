<?php
$app->group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function ($app) {
    $app->get('/', ['as' => 'root', 'uses' =>  'DefaultController@index']);
    $app->get('/user/logout', ['as' => 'user_logout', 'uses' =>  'UserController@logout']);

    $app->get('/form', ['as' => 'root', 'uses' =>  'DefaultController@form']);
    $app->get('/table', ['as' => 'root', 'uses' =>  'DefaultController@table']);

    // работа с заказами
    $app->post('/order/add', ['as' => 'order_insert', 'uses' =>  'OrderController@insert']);
});

// пользователи
$app->get('/login', ['as' => 'login', 'uses' =>  'UserController@login']);
$app->post('/login/check', ['as' => 'login_check', 'uses' =>  'UserController@check']);
