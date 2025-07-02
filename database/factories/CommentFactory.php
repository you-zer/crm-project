<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'client_id' => Client::inRandomOrder()->first()?->id ?? Client::factory(),
            'user_id'   => User::inRandomOrder()->first()?->id ?? User::factory(),
            'content'   => $this->faker->paragraph(),
        ];
    }
}
