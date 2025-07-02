<?php

declare(strict_types=1);

namespace App\Services\Implementations;

use App\Models\Interaction;
use App\Services\Contracts\InteractionServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class InteractionService implements InteractionServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Interaction::with(['client', 'user'])->paginate($perPage);
    }

    public function create(array $data): Interaction
    {
        return DB::transaction(fn() => Interaction::create($data));
    }

    public function find(int $id): Interaction|null
    {
        return Interaction::find($id);
    }

    public function update(Interaction $interaction, array $data): Interaction
    {
        return DB::transaction(function () use ($interaction, $data): Interaction {
            $interaction->update($data);
            return $interaction->refresh();
        });
    }

    public function delete(Interaction $interaction): bool
    {
        return DB::transaction(fn() => (bool) $interaction->delete());
    }
}
