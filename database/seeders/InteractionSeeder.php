<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Interaction;
use Illuminate\Database\Seeder;

class InteractionSeeder extends Seeder
{
    public function run(): void
    {
        // Generate sample interactions
        Interaction::factory()
            ->count(50)
            ->create();
    }
}
