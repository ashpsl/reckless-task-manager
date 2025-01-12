<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncrementStatusRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function create(): View
    {
        return view('tasks_create');
    }

    public function store(StoreTaskRequest $request, TaskService $taskService): RedirectResponse
    {
        $validated = $request->validated();

        $taskService->create($validated['name'], $validated['description']);

        $task = $taskService->get_last_inserted();

        return to_route('tasks_edit', ['id' => $task->id]);
    }

    public function edit($id): View
    {
        try {
            $task = Task::findOrFail($id);
            return view('tasks_edit', ['task' => $task]);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
    }

    public function update(StoreTaskRequest $request, TaskService $taskService, $id): RedirectResponse
    {
        $validated = $request->validated();

        $taskService->update($id, $validated['name'], $validated['description'], 0);

        return to_route('tasks_edit', ['id' => $id]);
    }

    public function list(TaskService $taskService): View
    {
        $tasks = $taskService->get_all();
        return view('dashboard', ['tasks' => $tasks]);
    }

    public function status(IncrementStatusRequest $request, TaskService $taskService): View
    {
        $validated = $request->validated();

        $taskService->update_status($validated['id']);

        return view('dashboard', ['tasks' => $taskService->get_all()]);
    }
}
