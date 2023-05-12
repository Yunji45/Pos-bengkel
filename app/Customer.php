<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'user_id',
        'no_antrian',
        'nama', 
        'alamat', 
        'no_telp',
        'is_call',
        'tanggal_antrian'
    ];

    public function barang()
    {
        return $this->belongsTo(User::class);
    }
}
