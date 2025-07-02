<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Services\Contracts\ClientServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Tag;


final class ClientController extends Controller
{
    use AuthorizesRequests;

    public function __construct(
        private readonly ClientServiceInterface $service
    ) {
        $this->authorizeResource(Client::class, 'client');
    }

    public function index(): View
    {
        $clients = $this->service->paginate();
        return view('clients.index', compact('clients'));
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        $client = $this->service->create(array_merge(
            $request->validated(),
            ['created_by_user_id' => auth()->id]
        ));

        return response()->json($client, 201);
    }

    public function show(Client $client): View
    {
        return view('clients.show', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $updated = $this->service->update($client, $request->validated());
        return response()->json($updated);
    }

    public function destroy(Client $client): JsonResponse
    {
        $this->service->delete($client);
        return response()->json(null, 204);
    }

    public function create(): View
    {
        // Список всех тегов
        $tags = Tag::all();
        // Для create — нет отмеченных тегов
        $tagIds = [];

        return view('clients.create', compact('tags', 'tagIds'));
    }

    public function edit(Client $client): View
    {
        // Список всех тегов
        $tags = Tag::all();
        // Массив ID меток, уже связанных с клиентом
        $tagIds = $client->tags->pluck('id')->all();

        return view('clients.edit', compact('client', 'tags', 'tagIds'));
    }
}
