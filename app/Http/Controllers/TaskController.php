<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Services\TaskService;
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

        return to_route('tasks_create');
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
}
