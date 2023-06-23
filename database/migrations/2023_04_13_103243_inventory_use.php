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
        Schema::create('inventory_use', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_inventory')->nullable();
            $table->foreign('id_inventory')->references('id')->on('inventories')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('stok_berubah');
            $table->integer('status');
            $table->text('keterangan');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('stok_sekarang');

            $table->integer('harga')->default(0);
            $table->string('nota')->nullable();
            $table->dateTime('tanggal_kelola')->nullable();

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
        Schema::dropIfExists('inventory_use');
    }
};
