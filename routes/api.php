<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::get('/subscriptions', 'SubscriptionApiController@index');
    Route::get('/subscriptions/{id}', 'SubscriptionApiController@show');
    Route::post('/subscriptions/register', 'SubscriptionApiController@store');
    Route::post('/subscriptions/{id}/checkin', 'SubscriptionApiController@checkin');
    Route::post('/subscriptions/{id}/cancel', 'SubscriptionApiController@cancel');
    Route::get( '/subscriptions/{user}/email', 'SubscriptionApiController@sendSubscriptions'  );
});
?>
