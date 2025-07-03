<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Task;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'client_id' => Client::inRandomOrder()->first()?->id ?? Client::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->optional()->paragraph(),
            'status' => $this->faker->randomElement(['new','in_progress','completed']),
            'assigned_user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'created_by_user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'due_date' => $this->faker->dateTimeBetween('-1 week','+2 weeks'),
            'recurrence_type' => $this->faker->randomElement(['none','daily','weekly','monthly']),
            'recurrence_interval' => $this->faker->numberBetween(1,5),
            'recurrence_until' => $this->faker->optional()->dateTimeBetween('+2 weeks','+6 months'),
        ];
    }
}
