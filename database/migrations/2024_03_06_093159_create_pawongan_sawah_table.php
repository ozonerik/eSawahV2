<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pawongan_sawah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sawah_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pawongan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sawah_pawongan');
    }
};
