<?php

declare(strict_types=1);

namespace App\Services\Implementations;

use App\Models\Comment;
use App\Services\Contracts\CommentServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class CommentService implements CommentServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Comment::with(['client', 'user'])->paginate($perPage);
    }

    public function create(array $data): Comment
    {
        return DB::transaction(fn() => Comment::create($data));
    }

    public function find(int $id): ?Comment
    {
        return Comment::find($id);
    }

    public function update(Comment $comment, array $data): Comment
    {
        return DB::transaction(function () use ($comment, $data): Comment {
            $comment->update($data);
            return $comment->refresh();
        });
    }

    public function delete(Comment $comment): bool
    {
        return DB::transaction(fn() => (bool) $comment->delete());
    }
}
