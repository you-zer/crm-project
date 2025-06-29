<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

Artisan::command('crm:job-status', function (Command $command) {
    // теперь $command однозначно Command
    $command->comment('Проверяем статус задач CRM...');
})->describe('Показывает статус background–задач CRM');
