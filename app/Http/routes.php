<?php

use App\Task;
use Illuminate\Http\Request;

Route::auth();
Route::get('/tas', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

});
