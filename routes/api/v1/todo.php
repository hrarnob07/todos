<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'todos'],function (){
    Route::get('/','Api\V1\Todos\Index');
    Route::post('/','Api\V1\Todos\Store');
    Route::delete('/{id}','Api\V1\Todos\Delete');
    Route::put('/{id}','Api\V1\Todos\Update');
    Route::post('/clear-completed','Api\V1\Todos\ClearCompleted');
    Route::get('/active','Api\V1\Todos\Active');
    Route::get('/completed','Api\V1\Todos\Completed');

});
