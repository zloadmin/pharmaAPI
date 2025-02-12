<?php

use App\Models\Laboratory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('pharmacological_article_id')->nullable();
            $table->foreign('pharmacological_article_id')->references('id')->on('pharmacological_articles')->onDelete('cascade');

            // check list
            $table->json('check_values')->nullable();
            // videos
            foreach (Laboratory::VIDEOS as $video) {
                $table->unsignedBigInteger($video['key'])->nullable()->comment($video['name']);
                $table->foreign($video['key'])->references('id')->on('videos')->onDelete('cascade');
            }

            // Chromatograph values
            $table->decimal('chromatograph_column_temp', 5, 1)->nullable();
            $table->decimal('chromatograph_flow_speed', 5, 3)->nullable();
            $table->unsignedBigInteger('chromatograph_detector')->nullable();
            $table->unsignedBigInteger('chromatograph_value')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
