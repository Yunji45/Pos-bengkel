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
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(User::class);
    }
}
