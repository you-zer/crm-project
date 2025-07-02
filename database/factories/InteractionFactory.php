<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Interaction;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InteractionFactory extends Factory
{
    protected $model = Interaction::class;

    public function definition(): array
    {
        // Create or get random client and user
        $client = Client::inRandomOrder()->first() ?? Client::factory();
        $user   = User::inRandomOrder()->first() ?? User::factory();

        return [
            'client_id' => $client instanceof Client ? $client->id : $client,
            'user_id'   => $user instanceof User   ? $user->id   : $user,
            'type'      => $this->faker->randomElement(['call', 'email', 'meeting']),
            'content'   => $this->faker->optional()->paragraph(),
        ];
    }
}
