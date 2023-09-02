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
        Schema::create('pengajuan_barang_barus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nama_barang');
            $table->integer('jumlah_barang');
            $table->string('informasi_barang');
            $table->date('tanggal_pengajuan')->default(now());
            $table->boolean('status_manajer')->default(false);
            $table->boolean('status_barang_sampai')->default(false);
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
        Schema::dropIfExists('pengajuan_barang_barus');
    }
};
