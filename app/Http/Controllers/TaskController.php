<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tas;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tas
     * @return void
     */
    public function __construct(TaskRepository $tas)
    {
        $this->middleware('auth');

        $this->tas = $tas;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tas.index', [
            'tas' => $this->tas->forUser($request->user()),
        ]);
    }
/**
 * Create a new task.
 *
 * @param  Request  $request
 * @return Response
 */
public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|max:255',
    ]);

    // Create The Task...
	
	 $request->user()->tas()->create([
        'name' => $request->name,
    ]);

    return redirect('/tas');
}
	
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
}
