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
}
