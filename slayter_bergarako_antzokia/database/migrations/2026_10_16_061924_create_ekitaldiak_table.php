<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Egoera; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('ekitaldiak', function (Blueprint $table) {
        $table->id();
        $table->string('izenburua', 200);
        $table->text('deskripzioa')->nullable();
        $table->date('ekitaldi_data');
        $table->time('ordua');
        $table->string('irudia', 255)->nullable();
        $table->integer('aforo');
        $table->integer('aforo_librea');
        $table->enum('egoera', [
            Egoera::AKTIBOA->value, 
            Egoera::BERTAN_BEHERA->value, 
            Egoera::BUKATUTA->value, 
            Egoera::AGORTUTA->value
        ])->default(Egoera::AKTIBOA->value);
        $table->decimal('prezio_sarrera', 10, 2);
        $table->unsignedBigInteger('id_sortzailea');
        $table->timestamps();

        $table->foreign('id_sortzailea')->references('id')->on('users')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekitaldiak');
    }
};
