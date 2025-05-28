<?php

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('session_components', function (Blueprint $table) {
            $table->id();
            $table->uuid('session')->index();
            $table->unsignedBigInteger('laboratory_id')->nullable();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->enum('place', SessionComponentPlace::values())->index();
            $table->enum('type', SessionComponentType::values())->default(SessionComponentType::Simple->value)->index();
            $table->unsignedBigInteger('component_id')->nullable();
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('valueStuff')->nullable();
            $table->decimal('valueLoose', 7, 5)->nullable();
            $table->decimal('valueLiquid', 7, 5)->nullable();

            // scales
            $table->boolean('is_weighed')->default(false);
            $table->boolean('is_dirty')->default(false);
            $table->unsignedBigInteger('mobile_phase_id')->nullable();
            $table->foreign('mobile_phase_id')->references('id')->on('laboratory_mobile_phases')->onDelete('cascade');

            // virtual component
            $table->unsignedBigInteger('virtual_component_id')->nullable();
            $table->foreign('virtual_component_id')->references('id')->on('components')->onDelete('cascade');



            $table->decimal('weighed_value', 8, 4)->nullable();

            $table->unsignedBigInteger('weighed_left_component_id')->nullable();
            $table->foreign('weighed_left_component_id')->references('id')->on('components')->onDelete('cascade');

            $table->unsignedBigInteger('weighed_right_component_id')->nullable();
            $table->foreign('weighed_right_component_id')->references('id')->on('components')->onDelete('cascade');

            $table->unsignedBigInteger('weighed_bottom_component_id')->nullable();
            $table->foreign('weighed_bottom_component_id')->references('id')->on('components')->onDelete('cascade');


            $table->unsignedBigInteger('weighed_left_session_component_id')->nullable();
            $table->foreign('weighed_left_session_component_id')->references('id')->on('session_components')->onDelete('cascade');

            $table->unsignedBigInteger('weighed_right_session_component_id')->nullable();
            $table->foreign('weighed_right_session_component_id')->references('id')->on('session_components')->onDelete('cascade');

            $table->unsignedBigInteger('weighed_bottom_session_component_id')->nullable();
            $table->foreign('weighed_bottom_session_component_id')->references('id')->on('session_components')->onDelete('cascade');

            // ph
            $table->decimal('ph_meter_value', 7, 4)->nullable();
            // mixer
            $table->unsignedBigInteger('mixer_seconds')->nullable();
            // bath
            $table->unsignedSmallInteger('bath_temperature')->nullable();
            $table->unsignedSmallInteger('bath_seconds')->nullable();
            // filtration
            $table->boolean('filtered')->default(false);
            // mixed
            $table->boolean('is_mixed')->default(false);


            $table->unsignedBigInteger('mixed_weighed_component_id')->nullable();
            $table->foreign('mixed_weighed_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_one_component_id')->nullable();
            $table->foreign('mixed_one_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_two_component_id')->nullable();
            $table->foreign('mixed_two_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_three_component_id')->nullable();
            $table->foreign('mixed_three_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_four_component_id')->nullable();
            $table->foreign('mixed_four_component_id')->references('id')->on('components')->onDelete('cascade');


            $table->unsignedBigInteger('mixed_weighed_session_component_id')->nullable();
            $table->foreign('mixed_weighed_session_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_one_session_component_id')->nullable();
            $table->foreign('mixed_one_session_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_two_session_component_id')->nullable();
            $table->foreign('mixed_two_session_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_three_session_component_id')->nullable();
            $table->foreign('mixed_three_session_component_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('mixed_four_session_component_id')->nullable();
            $table->foreign('mixed_four_session_component_id')->references('id')->on('session_components')->onDelete('cascade');

            // filtering example components
            $table->unsignedBigInteger('filtered_example_one_component_id')->nullable();
            $table->foreign('filtered_example_one_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('filtered_example_two_component_id')->nullable();
            $table->foreign('filtered_example_two_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('filtered_example_three_component_id')->nullable();
            $table->foreign('filtered_example_three_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('filtered_example_four_component_id')->nullable();
            $table->foreign('filtered_example_four_component_id')->references('id')->on('components')->onDelete('cascade');
            // filtering example session components
            $table->unsignedBigInteger('filtered_example_one_session_cmp_id')->nullable(); // session_components_filtered_example_one_session_component_id_foreign to long
            $table->foreign('filtered_example_one_session_cmp_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('filtered_example_two_session_cmp_id')->nullable();
            $table->foreign('filtered_example_two_session_cmp_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('filtered_example_three_session_cmp_id')->nullable();
            $table->foreign('filtered_example_three_session_cmp_id')->references('id')->on('session_components')->onDelete('cascade');
            $table->unsignedBigInteger('filtered_example_four_session_cmp_id')->nullable();
            $table->foreign('filtered_example_four_session_cmp_id')->references('id')->on('session_components')->onDelete('cascade');

            // filtering mobile phase
            $table->unsignedBigInteger('filtered_mobile_phase_component_id')->nullable();
            $table->foreign('filtered_mobile_phase_component_id')->references('id')->on('components')->onDelete('cascade');
            $table->unsignedBigInteger('filtered_mobile_phase_session_cmp_id')->nullable();
            $table->foreign('filtered_mobile_phase_session_cmp_id')->references('id')->on('session_components')->onDelete('cascade');


            $table->softDeletes();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_components');
    }
};
