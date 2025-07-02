<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        // Пример начальных меток
        $tags = ['VIP', 'New', 'Priority', 'Long-term', 'Prospect'];
        foreach ($tags as $name) {
            Tag::firstOrCreate(['name' => $name]);
        }
    }
}
