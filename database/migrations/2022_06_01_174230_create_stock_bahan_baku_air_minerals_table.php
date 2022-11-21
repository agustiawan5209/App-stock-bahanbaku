<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockBahanBakuAirMineralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_bahan_baku_air_minerals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahanbaku_air_id')->nullable();
            $table->integer('jumlah_stock');
            $table->string('satuan', 100);
            $table->date('tgl_stock')->nullable();
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
        Schema::dropIfExists('stock_bahan_baku_air_minerals');
    }
}
