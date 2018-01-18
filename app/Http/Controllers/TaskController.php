<?php

namespace ToDo\Http\Controllers;

use Illuminate\Http\Request;
use ToDo\Task;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
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
