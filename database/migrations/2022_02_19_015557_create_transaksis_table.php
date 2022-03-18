<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('no_transaksi');
            $table->date('tgl_pesan');
            $table->date('tgl_pinjam');
            $table->date('tgl_rencana');
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('supir_id')->unsigned();
            $table->bigInteger('kendaraan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supir_id')->references('id')->on('supirs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('lama_pakai');
            $table->integer('total_bayar');

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
        Schema::dropIfExists('transaksis');
    }
}
