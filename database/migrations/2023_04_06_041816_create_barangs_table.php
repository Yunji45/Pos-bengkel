<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('barcode', 100);
            $table->string('nama', 100);
            $table->enum('type',['konsumsi','pembersih']);
            $table->integer('stok')->nullable();
            $table->integer('harga_beli')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->integer('profit');
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
        Schema::dropIfExists('barang');
    }
}