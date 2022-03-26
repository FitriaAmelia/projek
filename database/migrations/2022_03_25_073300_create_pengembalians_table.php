<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pinjam');
            $table->date('tgl_pengembalian');
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('kendaraan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('kendaraan_id')->references('id')->on('kendaraans')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->integer('denda');
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
        Schema::dropIfExists('pengembalians');
    }
}
