<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['barcode', 'nama', 'type', 'stok', 'harga_beli', 'harga_jual', 'profit'];

}