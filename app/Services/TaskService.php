<?php

namespace ToDo\Services;

use ToDo\Task;
use ToDo\TimeEntry;

class TaskService
{
    public static function stopRunningEntries($task_id)
    {
        //Find the Task
        $task = Task::find($task_id);

        //For each task still running, stop it.
        $stillRunning = $task->runningEntries;
        foreach($stillRunning as $running) {
            $running->update(['stopped' => date('Y-m-d h:i:s')]);
        }
    }
}