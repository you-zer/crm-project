<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\Interaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface InteractionServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function create(array $data): Interaction;

    public function find(int $id): Interaction|null;

    public function update(Interaction $interaction, array $data): Interaction;

    public function delete(Interaction $interaction): bool;
}
