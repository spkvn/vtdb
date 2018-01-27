<?php

namespace ToDo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use ToDo\Services\TaskService;
use ToDo\Task;
use ToDo\TimeEntry;
use ToDo\User;
use function var_dump;

class TaskController extends Controller
{
    public function index()
    {
        if(request('user')!= null){
            return response()->json(User::find(request('user'))->tasks);
        } else {
            return response()->json(['message' => 'No user specified'], 400);
        }
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

    public function entries()
    {
        $task = Task::find(request('task_id'));
        return response()->json($task->timeEntries->sortByDesc('created_at'));
    }

    public function delete(Task $task)
    {
        $task->delete();
        return 204;
    }

    public function createEntry()
    {
        TaskService::stopRunningEntries(request('task_id'));

        $timeEntry = TimeEntry::create([
            'started' => request('startTime'),
            'task_id' => request('task_id')
        ]);

        return response()->json($timeEntry);
    }
}
