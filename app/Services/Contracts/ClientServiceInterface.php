<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ClientServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function create(array $data): Client;

    public function find(int $id): Client|null;

    public function update(Client $client, array $data): Client;

    public function delete(Client $client): bool;
}
