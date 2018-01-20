<?php

namespace ToDo\Http\Controllers;

use Illuminate\Http\Request;
use ToDo\Task;
use ToDo\User;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(User::find(request('user'))->tasks);
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(Request $request)
    {
        return Task::create($request->all());
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return $task;
    }

    public function delete(Task $task)
    {
        $task->delete();
        return 204;
    }
}
