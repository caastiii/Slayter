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
    Schema::create('sarrerak', function (Blueprint $table) {
        $table->id();
        $table->dateTime('data_erosketa');
        $table->integer('kantitatea');
        $table->unsignedBigInteger('id_erabiltzaile');
        $table->unsignedBigInteger('id_ekitaldia');
        $table->timestamps();

        $table->foreign('id_erabiltzaile')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('id_ekitaldia')->references('id')->on('ekitaldiak')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarrerak');
    }
};
