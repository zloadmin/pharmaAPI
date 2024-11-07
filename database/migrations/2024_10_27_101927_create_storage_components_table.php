<?php

use App\Enums\StorageComponent\StorageComponentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('storage_components', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name');
            $table->decimal('padding_top', 5, 3)->default(0);
            $table->decimal('padding_right', 5, 3)->default(0);
            $table->text('description');
            $table->string('image');
            $table->enum('type', StorageComponentType::values());
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storage_components');
    }
};
