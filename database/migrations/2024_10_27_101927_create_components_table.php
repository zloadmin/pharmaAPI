<?php

use App\Enums\Component\ComponentNamingType;
use App\Enums\Component\ComponentType;
use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\Component;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Назавние');
            $table->unsignedBigInteger('value')->nullable();
            $table->string('short_name')->nullable()->comment('Короткое название');
            $table->decimal('padding_top', 5, 3)->default(0)->comment('Отступ сверху');
            $table->decimal('padding_right', 5, 3)->default(0)->comment('Отступ справа');
            $table->text('description')->nullable()->comment('Описание');
            $table->string('image')->nullable()->comment('Изображение');
            $table->enum('type', ComponentType::values())->nullable()->comment('type');
            $table->enum('naming_type', ComponentNamingType::values())->nullable()->comment('naming type');
            $table->enum('on_scales_place', SessionComponentPlace::getOnScalesValues())->nullable();
            $table->enum('on_mix_place', SessionComponentPlace::getMixStuffPlaceValues())->nullable();
            $table->enum('on_filtration_examples_place', SessionComponentPlace::getFiltrationExamplesPlaceValues())->nullable();
            $table->decimal('weight', 4)->default(0);
            $table->boolean('ph_meter_able')->default(false);
            $table->decimal('ph_meter_value', 7, 4)->default(0);
            $table->boolean('mixer_able')->default(false);
            $table->boolean('bath_able')->default(false);
            $table->boolean('is_special')->default(false);
            $table->boolean('filtration_able')->default(false);
            $table->boolean('mix_able')->default(false);
            $table->boolean('is_example')->default(false);
            $table->boolean('is_virtual')->default(false)->index();
            $table->unsignedBigInteger('virtual_component_left_id')->nullable();
            $table->unsignedBigInteger('virtual_component_right_id')->nullable();
            $table->unsignedBigInteger('virtual_laboratory_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
