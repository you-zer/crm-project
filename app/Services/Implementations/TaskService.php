<?php

declare(strict_types=1);

namespace App\Services\Implementations;

use App\Models\Task;
use App\Services\Contracts\TaskServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class TaskService implements TaskServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Task::with(['client', 'assignedUser', 'creator'])->paginate($perPage);
    }

    public function create(array $data): Task
    {
        return DB::transaction(fn() => Task::create($data));
    }

    public function find(int $id): ?Task
    {
        return Task::find($id);
    }

    public function update(Task $task, array $data): Task
    {
        return DB::transaction(function () use ($task, $data) {
            $task->update($data);
            return $task->refresh();
        });
    }

    public function delete(Task $task): bool
    {
        return DB::transaction(fn() => $task->delete());
    }
}
