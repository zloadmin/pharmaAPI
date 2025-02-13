<?php

use App\Enums\Chromatograph\ChromatographStatusColumns;
use App\Enums\Chromatograph\ChromatographStatusEntries;
use App\Enums\Chromatograph\ChromatographStatusFlushValve;
use App\Enums\Chromatograph\ChromatographStatusInstalledJars;
use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Enums\Chromatograph\ChromatographStatusPump;
use App\Enums\Chromatograph\ChromatographStatusSoftWare;
use App\Enums\Chromatograph\ChromatographStatusTurnOn;
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
            // rooms
            // lock rooms
            $table->boolean('is_lock_index')->default(false);
            $table->boolean('is_lock_storage')->default(false);
            $table->boolean('is_lock_weighting')->default(true);
            $table->boolean('is_lock_cooking')->default(true);
            $table->boolean('is_lock_chromatograph')->default(true);

            // check list
            $table->json('check_values')->nullable();
            // Chromatograph
            $table->json('chromatograph_values')->nullable();
//            $table->decimal('check_value_one', 9, 4)->nullable();
//            $table->decimal('check_value_two', 9, 4)->nullable();

            // scales
            $table->decimal('scales_weight_calibration', 4)->default(0);


            // chromatograph
//            $table->boolean('chromatograph_is_set')->default(false);
//            $table->boolean('chromatograph_is_turn_on')->default(false);
//            $table->boolean('chromatograph_is_open')->default(false);
//            $table->boolean('chromatograph_replaced')->default(false);
//            $table->boolean('chromatograph_pump')->default(false);
//            $table->boolean('chromatograph_injector')->default(false);
            $table->enum('chromatograph_status_turn_on', ChromatographStatusTurnOn::values())
                ->default(ChromatographStatusTurnOn::getDefaultStatusValue())->comment('Статус включения хроматографа');

            $table->enum('chromatograph_status_installed_jars', ChromatographStatusInstalledJars::values())
                ->default(ChromatographStatusInstalledJars::getDefaultStatusValue())->comment('Статус установки банок хроматографа');

            $table->enum('chromatograph_status_flush_valve', ChromatographStatusFlushValve::values())
                ->default(ChromatographStatusFlushValve::getDefaultStatusValue())->comment('Статус вентиля промывки хроматографа');

            $table->enum('chromatograph_status_pump', ChromatographStatusPump::values())
                ->default(ChromatographStatusPump::getDefaultStatusValue())->comment('Статус насоса хроматографа');

            $table->enum('chromatograph_status_columns', ChromatographStatusColumns::values())
                ->default(ChromatographStatusColumns::getDefaultStatusValue())->comment('Статус колонок хроматографа');

            $table->enum('chromatograph_status_introduce_sample', ChromatographStatusIntroduceSample::values())
                ->default(ChromatographStatusIntroduceSample::getDefaultStatusValue())->comment('Статус запуска ввода пробы хроматографа');

            $table->enum('chromatograph_status_soft_ware', ChromatographStatusSoftWare::values())
                ->default(ChromatographStatusSoftWare::getDefaultStatusValue())->comment('Статус запуска ПО хроматографа');

            $table->enum('chromatograph_status_entries', ChromatographStatusEntries::values())
                ->default(ChromatographStatusEntries::getDefaultStatusValue())->comment('Статус внесения записей хроматографа');


            // Chromatograph values
            $table->decimal('chromatograph_column_temp', 9, 1)->nullable();
            $table->decimal('chromatograph_flow_speed', 9, 3)->nullable();
            $table->unsignedBigInteger('chromatograph_detector')->nullable();
            $table->unsignedBigInteger('chromatograph_value')->nullable();

//            $table->boolean('chromatograph_status_is_turn_on')->default(false);
//            $table->boolean('chromatograph_status_is_open')->default(false);
//            $table->boolean('chromatograph_status_replaced')->default(false);
//            $table->boolean('chromatograph_status_pump')->default(false);
//            $table->boolean('chromatograph_status_injector')->default(false);

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
