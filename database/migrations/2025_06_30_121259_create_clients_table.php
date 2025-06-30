<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 100)->comment('Фамилия');
            $table->string('first_name', 100)->comment('Имя');
            $table->string('middle_name', 100)->nullable()->comment('Отчество');
            $table->string('company', 150)->nullable()->comment('Компания');
            $table->string('email', 150)->unique()->comment('E-mail клиента');
            $table->string('phone', 50)->nullable()->comment('Телефон');
            $table->text('address')->nullable()->comment('Адрес');
            $table->decimal('latitude', 10, 7)->nullable()->comment('Широта');
            $table->decimal('longitude', 10, 7)->nullable()->comment('Долгота');

            // Внешние ключи
            $table->unsignedBigInteger('status_id')->comment('Статус клиента');
            $table->unsignedBigInteger('assigned_user_id')->nullable()->comment('Ответственный менеджер');
            $table->unsignedBigInteger('created_by_user_id')->comment('Кто создал запись');

            $table->timestamps();

            // Связи
            $table->foreign('status_id')
                  ->references('id')
                  ->on('statuses')
                  ->onDelete('restrict');

            $table->foreign('assigned_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');

            $table->foreign('created_by_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
