<?php

use App\Enums\Student\EducationMode;
use App\Enums\Student\EducationStatus;
use App\Enums\User\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->comment('Полное имя');
            $table->string('email')->nullable()->unique()->comment('Электронная почта');
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->comment('Пароль');

            $table->enum('role', UserRole::values())->default(UserRole::Student)->index()->comment('Роль');
            // Teacher
            $table->unsignedBigInteger('department_id')->nullable()->comment('Кафедра');
            $table->string('regalia')->nullable()->comment('Регалии');
            $table->unsignedSmallInteger('age')->nullable()->comment('Возраст');

            // Student
            $table->unsignedBigInteger('teacher_id')->nullable()->comment('Преподаватель');
            $table->date('date_of_birth')->nullable()->comment('Дата рождения');
            $table->enum('education_mode', EducationMode::values())->nullable()->comment('Режим обучения');
            $table->enum('education_status', EducationStatus::values())->nullable()->comment('Статус');
            $table->unsignedBigInteger('group_id')->nullable()->comment('Группа');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });;

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
