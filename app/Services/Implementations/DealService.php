<?php

declare(strict_types=1);

namespace App\Services\Implementations;

use App\Models\Deal;
use App\Services\Contracts\DealServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class DealService implements DealServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Deal::with(['client', 'assignedUser'])->paginate($perPage);
    }

    public function create(array $data): Deal
    {
        return DB::transaction(fn() => Deal::create($data));
    }

    public function find(int $id): ?Deal
    {
        return Deal::find($id);
    }

    public function update(Deal $deal, array $data): Deal
    {
        return DB::transaction(fn() => tap($deal, fn($d) => $d->update($data)));
    }

    public function delete(Deal $deal): bool
    {
        return DB::transaction(fn() => $deal->delete());
    }
}
