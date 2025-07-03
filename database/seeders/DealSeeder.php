<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Deal;
use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
    public function run(): void
    {
        Deal::factory()->count(30)->create();
    }
}
