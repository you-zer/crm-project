<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\Comment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CommentServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function create(array $data): Comment;
    public function find(int $id): ?Comment;
    public function update(Comment $comment, array $data): Comment;
    public function delete(Comment $comment): bool;
}
