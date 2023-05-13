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
            // $table->unsignedBigInteger('supplier_id');
            // $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->string('barcode', 100);
            $table->string('nama', 100);
            $table->enum('type',['produk','service']);
            // $table->enum('satuan', ['pcs', 'pck']);
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