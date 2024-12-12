<?php

use App\Enums\SessionComponent\SessionComponentPlace;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('session_components', function (Blueprint $table) {
            $table->id();
            $table->uuid('session')->index();
            $table->enum('place', SessionComponentPlace::values())->index();
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('valueStuff')->nullable();
            $table->decimal('valueLoose', 7, 5)->nullable();
            $table->decimal('valueLiquid', 7, 5)->nullable();

            // scales
            $table->boolean('is_weighed')->default(false);
            $table->decimal('weighed_value', 8, 4)->nullable();
            $table->unsignedBigInteger('weighed_left_component_id')->nullable();
            $table->foreign('weighed_left_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('weighed_right_component_id')->nullable();
            $table->foreign('weighed_right_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('weighed_bottom_component_id')->nullable();
            $table->foreign('weighed_bottom_component_id')->references('id')->on('session_components')->onDelete('cascade');

            // mixer
            $table->unsignedBigInteger('mixer_seconds')->nullable();
            // bath
            $table->unsignedSmallInteger('bath_temperature')->nullable();
            $table->unsignedSmallInteger('bath_seconds')->nullable();
            // filtration
            $table->boolean('filtered')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_components');
    }
};
