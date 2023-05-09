<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table= 'services';
    protected $fillable = [
        'suplier_id',
        'barcode',
        'nama',
        'harga_jual',
        'profit',
    ];

    public function suplier ()
    {
        return $this->belongsTo(Supplier::class);
    }
}
