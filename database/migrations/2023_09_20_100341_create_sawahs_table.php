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
        Schema::create('sawahs', function (Blueprint $table) {
            $table->id();
            $table->string('nosawah');
            $table->string('namasawah');
            $table->decimal('luas',10,2);
            $table->string('lokasi');
            $table->string('latlang')->nullable();
            $table->string('b_barat')->nullable();
            $table->string('b_utara')->nullable();
            $table->string('b_timur')->nullable();
            $table->string('b_selatan')->nullable();
            $table->string('namapenjual')->nullable();
            $table->unsignedInteger('hargabeli')->nullable();
            $table->string('namapembeli')->nullable();
            $table->unsignedInteger('hargajual')->nullable();
            $table->string('img')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('sawahs');
    }
};
