<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name' => 'Новый',      'description' => 'Только что добавленный клиент'],
            ['name' => 'В работе',   'description' => 'Менеджер ведёт коммуникацию'],
            ['name' => 'Закрыт',     'description' => 'Сделка завершена'],
            ['name' => 'Отложен',    'description' => 'Заявка отложена'],
        ];

        foreach ($statuses as $data) {
            Status::firstOrCreate(['name' => $data['name']], $data);
        }
    }
}
