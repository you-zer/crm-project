<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TaskServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function create(array $data): Task;
    public function find(int $id): ?Task;
    public function update(Task $task, array $data): Task;
    public function delete(Task $task): bool;
}
