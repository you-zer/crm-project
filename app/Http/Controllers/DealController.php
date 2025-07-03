<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreDealRequest;
use App\Http\Requests\UpdateDealRequest;
use App\Models\Deal;
use App\Models\Client;
use App\Services\Contracts\DealServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class DealController extends Controller
{
    public function __construct(private readonly DealServiceInterface $service)
    {
        $this->authorizeResource(Deal::class, 'deal');
    }

    public function index(): View
    {
        $deals = $this->service->paginate();
        return view('deals.index', compact('deals'));
    }

    public function create(): View
    {
        $clients = Client::all();
        return view('deals.create', compact('clients'));
    }

    public function store(StoreDealRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->create($data);
        return redirect()->route('deals.index')->with('status', 'Deal recorded');
    }

    public function show(Deal $deal): View
    {
        return view('deals.show', compact('deal'));
    }

    public function edit(Deal $deal): View
    {
        $clients = Client::all();
        return view('deals.edit', compact('deal', 'clients'));
    }

    public function update(UpdateDealRequest $request, Deal $deal): RedirectResponse
    {
        $this->service->update($deal, $request->validated());
        return redirect()->route('deals.index')->with('status', 'Deal updated');
    }

    public function destroy(Deal $deal): RedirectResponse
    {
        $this->service->delete($deal);
        return redirect()->route('deals.index')->with('status', 'Deal deleted');
    }
}
