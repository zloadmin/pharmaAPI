<?php

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
            $table->string('short_name')->comment('Короткое название');
            $table->decimal('padding_top', 5, 3)->default(0)->comment('Отступ сверху');
            $table->decimal('padding_right', 5, 3)->default(0)->comment('Отступ справа');
            $table->text('description')->comment('Описание');
            $table->string('image')->comment('Изображение');
            $table->enum('type', ComponentType::values())->comment('type');
            $table->enum('on_scales_place', SessionComponentPlace::getOnScalesValues());
            $table->decimal('weight', 4)->default(0);
            $table->boolean('ph_meter_able')->default(false);
            $table->decimal('ph_meter_value', 7, 4)->default(0);
            $table->boolean('mixer_able')->default(false);
            $table->boolean('bath_able')->default(false);
            $table->boolean('filtration_able')->default(false);
            $table->boolean('mix_able')->default(false);
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
