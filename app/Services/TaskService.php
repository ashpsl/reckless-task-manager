<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    private $STATUS = [
        'New',
        'In Progress',
        'Under Review',
        'Completed',
    ];

    public function create($name, $description, $status = 0)
    {
        $task = new Task;

        $task->name = $name;
        $task->description = $description;
        $task->status = $status;

        $task->save();
    }

    public function read($id)
    {
        return Task::find($id);
    }

    public function update($id, $name, $description, $status)
    {
        $task = Task::find($id);

        $task->name = $name;
        $task->description = $description;
        $task->status = $status;

        $task->save();
    }

    public function delete($id)
    {
        //
    }

    public function get_last_inserted()
    {
        return Task::latest()->first();
    }
}
