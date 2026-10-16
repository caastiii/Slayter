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
        // 1. Tu tabla de usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('Abizena', 100)->nullable();
            $table->enum('Mota', ['Admin', 'Arrunta'])->default('Arrunta');
            $table->string('email', 150)->unique();
            $table->string('password', 255);
            $table->unsignedBigInteger('id_sortzailea')->nullable();
            $table->rememberToken(); // Necesario para la funcionalidad de "Recordarme"
            $table->timestamps();

            $table->foreign('id_sortzailea')->references('id')->on('users')->onDelete('set null');
        });

        // 2. Tabla de recuperación de contraseñas de Laravel
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. Tabla de sesiones de Laravel que te estaba dando el error 500
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