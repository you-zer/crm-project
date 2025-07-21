<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Status;
use App\Services\Contracts\ClientServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\Tag;
use App\Models\User;

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
        $statuses = Status::all();
        return view('clients.index', compact('clients', 'statuses'));
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        $data = array_merge(
            $request->validated(),
            ['created_by_user_id' => auth()->id()]
        );

        $client = $this->service->create($data);

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Клиент успешно создан');
    }

    public function show(Client $client): View
    {
        // сразу подтягиваем связи, чтобы не было ленивых запросов во вьюхе
        $client->load(['status', 'assignedUser', 'tags']);

        return view('clients.show', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $this->service->update($client, $request->validated());

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Клиент успешно обновлён');
    }

    public function destroy(Client $client): RedirectResponse
    {
        $this->service->delete($client);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Клиент удалён');
    }

    public function create(): View
    {
        // Список всех тегов
        $tags = Tag::all();
        $statuses = Status::all();
        $users = User::all();
        // Для create — нет отмеченных тегов
        $tagIds = [];

        return view('clients.create', compact('tags', 'tagIds', 'statuses', 'users'));
    }

    public function edit(Client $client): View
    {
        // Список всех тегов
        $tags = Tag::all();
        $statuses = Status::all();
        $users = User::all();
        // Массив ID меток, уже связанных с клиентом
        $tagIds = $client->tags->pluck('id')->all();

        return view('clients.edit', compact('client', 'tags', 'tagIds', 'statuses', 'users'));
    }
}
