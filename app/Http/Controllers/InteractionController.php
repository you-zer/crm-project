<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreInteractionRequest;
use App\Http\Requests\UpdateInteractionRequest;
use App\Models\Client;
use App\Models\Interaction;
use App\Services\Contracts\InteractionServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class InteractionController extends Controller
{
    public function __construct(
        private readonly InteractionServiceInterface $service
    ) {
        $this->authorizeResource(Interaction::class, 'interaction');
    }

    public function index(): View
    {
        $interactions = $this->service->paginate();
        return view('interactions.index', compact('interactions'));
    }

    public function create(): View
    {
        $clients = Client::all();
        return view('interactions.create', compact('clients'));
    }

    public function store(StoreInteractionRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id;

        $this->service->create($data);
        return redirect()->route('interactions.index')
                         ->with('status', 'Interaction recorded');
    }

    public function show(Interaction $interaction): View
    {
        return view('interactions.show', compact('interaction'));
    }

    public function edit(Interaction $interaction): View
    {
        $clients = Client::all();
        return view('interactions.edit', compact('interaction', 'clients'));
    }

    public function update(UpdateInteractionRequest $request, Interaction $interaction): RedirectResponse
    {
        $this->service->update($interaction, $request->validated());
        return redirect()->route('interactions.index')
                         ->with('status', 'Interaction updated');
    }

    public function destroy(Interaction $interaction): RedirectResponse
    {
        $this->service->delete($interaction);
        return redirect()->route('interactions.index')
                         ->with('status', 'Interaction deleted');
    }
}
