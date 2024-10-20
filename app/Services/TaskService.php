<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Log;

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

    public function get_all()
    {
        return array_map(function($task) {
            $task['status'] = $this->STATUS[$task['status']];
            return $task;
        }, Task::all()->toArray());
    }

    public function update_status($id)
    {
        $task = Task::find(intval($id));

        if ($task->status === count($this->STATUS) - 1) {
            return;
        }

        $task->status++;

        if ($task->status === count($this->STATUS) - 1) {
            $task->completed_date = date('Y-m-d H:i:s');
        }

        $task->save();

        $this->log_status_change(auth()->user()->id, $task->id, $this->STATUS[$task->status]);
    }

    public function log_status_change($user_id, $task_id, $status)
    {
        Log::info(
            "User {user_id} changed {task_id} status to {status}",
            [
                'user_id' => $user_id,
                'task_id' => $task_id,
                'status' => $status
            ]
        );
    }
}
