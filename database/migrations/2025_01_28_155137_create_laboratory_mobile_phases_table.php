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
        Schema::create('laboratory_mobile_phases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laboratory_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->string('name');
            $table->unsignedBigInteger('first_component_id');
            $table->foreign('first_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('second_component_id');
            $table->foreign('second_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_mobile_phases');
    }
};
