<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    private $STATUS = [
        'Open',
        'In Progress',
        'Completed',
    ];

    public function create($name, $description, $status = 0)
    {
        $task = new Task;

        $task->name = $name;
        $task->description = $description;
        $task->status = $this->STATUS[$status];

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
        $task->status = $this->STATUS[$status];

        $task->save();
    }

    public function delete($id)
    {
        //
    }
}