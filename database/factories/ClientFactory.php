<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statusId    = Status::inRandomOrder()->value('id') ?? Status::factory()->create()->id;
        $createdById = User::inRandomOrder()->value('id') ?? User::factory()->create()->id;
        $assignedId  = User::inRandomOrder()->value('id') ?? User::factory()->create()->id;

        return [
            'first_name'         => $this->faker->firstName(),
            'last_name'          => $this->faker->lastName(),
            'middle_name'        => $this->faker->optional()->firstName(),
            'company'            => $this->faker->optional()->company(),
            'email'              => $this->faker->unique()->safeEmail(),
            'phone'              => $this->faker->optional()->phoneNumber(),
            'address'            => $this->faker->optional()->address(),
            'latitude'           => $this->faker->optional()->latitude(),
            'longitude'          => $this->faker->optional()->longitude(),

            'status_id'          => $statusId,
            'created_by_user_id' => $createdById,
            'assigned_user_id'   => $assignedId,
        ];
    }
}
