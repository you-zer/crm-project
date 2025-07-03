<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\Deal;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DealServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function create(array $data): Deal;
    public function find(int $id): ?Deal;
    public function update(Deal $deal, array $data): Deal;
    public function delete(Deal $deal): bool;
}
