<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Deal;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DealFactory extends Factory
{
    protected $model = Deal::class;

    public function definition(): array
    {
        return [
            'client_id' => Client::inRandomOrder()->first()?->id ?? Client::factory(),
            'title'     => $this->faker->sentence(3),
            'amount'    => $this->faker->randomFloat(2, 100, 10000),
            'status'    => $this->faker->randomElement(['won', 'lost', 'pending']),
            'closed_at' => $this->faker->optional()->date(),
            'assigned_user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
