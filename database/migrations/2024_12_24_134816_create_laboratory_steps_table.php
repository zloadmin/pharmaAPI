<?php

use App\Enums\Laboratory\LaboratoryStepType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laboratory_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laboratory_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->unsignedBigInteger('position')->default(0);
            $table->unsignedBigInteger('pharmacological_article_id')->nullable();
            $table->foreign('pharmacological_article_id')->references('id')->on('pharmacological_articles')->onDelete('cascade');
            $table->string('name');
            $table->enum('type', LaboratoryStepType::values())->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_steps');
    }
};
