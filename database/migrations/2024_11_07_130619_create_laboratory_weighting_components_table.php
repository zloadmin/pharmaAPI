<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laboratory_weighting_components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laboratory_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->unsignedBigInteger('stuff_component_id');
            $table->foreign('stuff_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('filled_component_id');
            $table->foreign('filled_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->decimal('value_min', 8, 4);
            $table->decimal('value_max', 8, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_weighting_components');
    }
};
