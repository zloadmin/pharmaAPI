<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laboratory_storage_component', function (Blueprint $table) {
            $table->unsignedBigInteger('laboratory_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->unsignedBigInteger('storage_component_id');
            $table->foreign('storage_component_id')->references('id')->on('storage_components')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_storage_component');
    }
};
