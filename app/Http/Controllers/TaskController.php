<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\Client;
use App\Services\Contracts\TaskServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class TaskController extends Controller
{
    public function __construct(private readonly TaskServiceInterface $service)
    {
        $this->authorizeResource(Task::class, 'task');
    }

    public function index(): View
    {
        $tasks = $this->service->paginate();
        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        $clients = Client::all();
        return view('tasks.create', compact('clients'));
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['created_by_user_id'] = auth()->id;
        $this->service->create($data);
        return redirect()->route('tasks.index')->with('status', 'Task created');
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        $clients = Client::all();
        return view('tasks.edit', compact('task', 'clients'));
    }

    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $this->service->update($task, $request->validated());
        return redirect()->route('tasks.index')->with('status', 'Task updated');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->service->delete($task);
        return redirect()->route('tasks.index')->with('status', 'Task deleted');
    }
}
