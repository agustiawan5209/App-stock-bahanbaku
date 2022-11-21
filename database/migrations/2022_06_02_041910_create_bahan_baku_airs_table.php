<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanBakuAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku_airs', function (Blueprint $table) {
            $table->id();
            $table->string('gambar', 255)->nullable();
            $table->integer('bahanbaku_air_id');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('jumlah_stock');
            $table->unsignedBigInteger('suppliers_id');
            $table->timestamps();
            $table->foreign('suppliers_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_baku_airs');
    }
}
