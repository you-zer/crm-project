<?php

declare(strict_types=1);

namespace App\Services\Implementations;

use App\Services\Contracts\ClientServiceInterface;
use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class ClientService implements ClientServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Client::paginate($perPage);
    }

    public function create(array $data): Client
    {
        return DB::transaction(function () use ($data): Client {
            $client = Client::create($data);
            if (!empty($data['tag_ids'])) {
                $client->tags()->sync($data['tag_ids']);
            }
            return $client->refresh();
        });
    }

    public function find(int $id): Client|null
    {
        return Client::find($id);
    }

    public function update(Client $client, array $data): Client
    {
        return DB::transaction(function () use ($client, $data): Client {
            $client->update($data);
            $client->tags()->sync($data['tag_ids'] ?? []);
            return $client->refresh();
        });
    }

    public function delete(Client $client): bool
    {
        return DB::transaction(function () use ($client): bool {
            return (bool) $client->delete();
        });
    }
}
