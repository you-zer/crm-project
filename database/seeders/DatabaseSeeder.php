<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            TagSeeder::class,
            ClientSeeder::class,
            InteractionSeeder::class,
            CommentSeeder::class,
        ]);
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('Admin');
    }
}
