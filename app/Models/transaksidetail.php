<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksidetail extends Model
{
    public $table = "transaksidetail";

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'jml',
        'harga_awal',
        'diskon',
        'harga_akhir',
        'jml_berat',
    ];

    public function produk()
    {
        return $this->belongsTo(produk::class, 'produk_id', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'transaksi_id', 'id');
    }
}
