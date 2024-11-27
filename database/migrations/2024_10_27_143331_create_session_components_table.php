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
