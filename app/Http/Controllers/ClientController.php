<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
        $clients = Client::paginate(15);
        return response()->json($clients);
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['created_by_user_id'] = auth();

        $client = Client::create($data);
        return response()->json($client, 201);
    }

    public function show(Client $client): JsonResponse
    {
        return response()->json($client);
    }

    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $client->update($request->validated());
        return response()->json($client);
    }

    public function destroy(Client $client): JsonResponse
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
