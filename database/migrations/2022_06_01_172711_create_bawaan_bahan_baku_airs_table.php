<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBawaanBahanBakuAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bawaan_bahan_baku_airs', function (Blueprint $table) {
            $table->id();
            $table->string('gambar' ,1000);
            $table->string('bahan_baku');
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
        Schema::dropIfExists('bawaan_bahan_baku_airs');
    }
}
