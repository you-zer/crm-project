<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->decimal('amount', 15, 2)->default(0);
            $table->enum('status', ['won', 'lost', 'pending'])->default('pending');
            $table->date('closed_at')->nullable();
            $table->foreignId('assigned_user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
