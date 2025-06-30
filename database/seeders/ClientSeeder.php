<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Status;
use App\Models\User;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $statusIds = Status::pluck('id')->all();
        $creatorId = User::first()->id ?? 1;

        Client::factory()
            ->count(50)
            ->state(function () use ($statusIds, $creatorId, $faker) {
                return [
                    'status_id'          => $faker->randomElement($statusIds),
                    'created_by_user_id' => $creatorId,
                    'assigned_user_id'   => User::inRandomOrder()->first()->id ?? $creatorId,
                ];
            })
            ->create();
    }
}
