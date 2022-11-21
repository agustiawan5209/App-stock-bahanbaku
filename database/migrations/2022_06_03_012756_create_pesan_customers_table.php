<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_customers', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesan' ,20)->unique();
            $table->date('tgl_pemesanan');
            $table->integer('jumlah_pesanan');
            $table->foreignId('customer_id');
            $table->string('sub_total' ,50);
            $table->foreignId('transaksi_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->longText('alamat');
            $table->enum('status', [ 'Belum konfirmasi','Konfirmasi','Proses' ,'Selesai']);
            $table->timestamps();
            // $table->date('tgl_pengiriman')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesan_customers');
    }
}
