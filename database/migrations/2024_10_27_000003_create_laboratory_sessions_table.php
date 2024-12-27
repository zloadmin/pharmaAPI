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
        Schema::create('laboratory_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('laboratory_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->uuid();
            $table->json('settings')->nullable();
            // scales
            $table->decimal('scales_weight_calibration', 4)->default(0);
            // chromatograph
            $table->boolean('chromatograph_is_set')->default(false);
            $table->boolean('chromatograph_is_turn_on')->default(false);
            $table->boolean('chromatograph_is_open')->default(false);
            $table->boolean('chromatograph_replaced')->default(false);
            $table->boolean('chromatograph_pump')->default(false);
            $table->boolean('chromatograph_injector')->default(false);

            $table->text('notepad_text')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_sessions');
    }
};
