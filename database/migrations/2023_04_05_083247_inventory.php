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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_notifikasi');
            $table->string('nama_barang');
            $table->string('gambar_barang')->default('default.jpg');
            $table->integer('stok_barang');
            $table->date('kadaluarsa_barang')->default(now());
            $table->string('satuan_barang');
            $table->integer('status_barang')->default(1);
            $table->text('informasi_barang');
            $table->unsignedBigInteger('id_supplier')->nullable();
            $table->foreign('id_supplier')->references('id')->on('supplier')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('barangs');
    }
};
