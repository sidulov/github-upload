<?php

use App\Task;
use Illuminate\Http\Request;

Route::auth();
Route::get('/tas', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

/**
 * Destroy the given task.
 *
 * @param  Request  $request
 * @param  Task  $task
 * @return Response
 */
public function destroy(Request $request, Task $task)
{
    $this->authorize('destroy', $task);

    $task->delete();

    return redirect('/tas');
}
});