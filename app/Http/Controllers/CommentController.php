<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Client;
use App\Services\Contracts\CommentServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class CommentController extends Controller
{
    public function __construct(
        private readonly CommentServiceInterface $service
    ) {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function index(): View
    {
        $comments = $this->service->paginate();
        return view('comments.index', compact('comments'));
    }

    public function create(): View
    {
        $clients = Client::all();
        return view('comments.create', compact('clients'));
    }

    public function store(StoreCommentRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id;

        $this->service->create($data);
        return redirect()->route('comments.index')
            ->with('status', 'Comment added');
    }

    public function show(Comment $comment): View
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment): View
    {
        $clients = Client::all();
        return view('comments.edit', compact('comment', 'clients'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment): RedirectResponse
    {
        $this->service->update($comment, $request->validated());
        return redirect()->route('comments.index')
            ->with('status', 'Comment updated');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $this->service->delete($comment);
        return redirect()->route('comments.index')
            ->with('status', 'Comment deleted');
    }
}
