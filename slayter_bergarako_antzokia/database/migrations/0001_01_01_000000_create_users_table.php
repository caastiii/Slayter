<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('Izena', 100);
        $table->string('Abizena', 100);
        $table->enum('Mota', ['Admin', 'Arrunta'])->default('Arrunta');
        $table->string('Korreoa', 150)->unique();
        $table->string('Pasahitza', 255);
        $table->unsignedBigInteger('id_sortzailea')->nullable();
        $table->timestamps();

        $table->foreign('id_sortzailea')->references('id')->on('users')->onDelete('set null');
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
