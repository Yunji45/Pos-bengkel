<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $fillable = ['user_id', 'kode_penjualan', 'nama', 'qty', 'total_harga'];

    public function user() 
    {
        return $this->belongsTo(user::class);
    }
}
