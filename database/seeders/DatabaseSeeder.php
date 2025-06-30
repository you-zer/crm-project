<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            ClientSeeder::class,
        ]);
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('Admin');
    }
}
