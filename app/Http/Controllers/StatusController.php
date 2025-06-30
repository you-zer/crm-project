<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    public function index(): JsonResponse
    {
        $statuses = Status::all();
        return response()->json($statuses);
    }

    public function store(StoreStatusRequest $request): JsonResponse
    {
        $status = Status::create($request->validated());
        return response()->json($status, 201);
    }

    public function show(Status $status): JsonResponse
    {
        return response()->json($status);
    }

    public function update(UpdateStatusRequest $request, Status $status): JsonResponse
    {
        $status->update($request->validated());
        return response()->json($status);
    }

    public function destroy(Status $status): JsonResponse
    {
        $status->delete();
        return response()->json(null, 204);
    }
}
