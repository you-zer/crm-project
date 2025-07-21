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
            $tags = $data['tag_ids'] ?? [];
            unset($data['tag_ids']);

            $client = Client::create($data);
            if (!empty($tags)) {
                $client->tags()->sync($tags);
            }
            return $client->load(['status', 'assignedUser', 'tags']);
        });
    }


    public function find(int $id): Client|null
    {
        return Client::find($id);
    }

    public function update(Client $client, array $data): Client
    {
        $tags = $data['tag_ids'] ?? [];
        unset($data['tag_ids']);

        $client->update($data);
        $client->tags()->sync($tags);

        return $client->load(['status', 'assignedUser', 'tags']);
    }

    public function delete(Client $client): bool
    {
        return DB::transaction(function () use ($client): bool {
            return (bool) $client->delete();
        });
    }
}
