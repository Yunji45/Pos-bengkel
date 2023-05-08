<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['nama', 'alamat', 'no_telp'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
