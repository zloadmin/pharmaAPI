<?php

use App\Enums\Ticket\TicketLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('number')->comment('№ Билета');
            $table->string('title')->comment('Название билета');
            $table->string('description_path')->comment('Описание задания (путь на диске)');
            $table->string('description_original_name')->comment('Описание задания (название файла)');
            $table->json('videos')->comment('Список видео');
            $table->enum('level', TicketLevel::values())->comment('Уровень сложности');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
