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
        Schema::create('cart_storage_components', function (Blueprint $table) {
            $table->id();
            $table->uuid('session')->index();
            $table->unsignedBigInteger('storage_component_id');
            $table->foreign('storage_component_id')->references('id')->on('storage_components')->onDelete('cascade');
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
        Schema::dropIfExists('cart_storage_components');
    }
};
