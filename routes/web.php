<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api', 'namespace' => 'Api'], function() use ($router)
{
    $router->group(['prefix' => 'v1', 'namespace' => 'v1'], function() use ($router) {
        $router->post('/', [
            'as' => 'calculate', 'uses' => 'DistanceController@calculate'
        ]);
        $router->get('/', [
            'as' => 'calculate', 'uses' => 'DistanceController@calculate'
        ]);
    });
});