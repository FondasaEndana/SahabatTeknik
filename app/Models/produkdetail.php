<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produkdetail extends Model
{
    public $table = "produkdetail";

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'harga_beli',
        'jml',
        'restok_id',
        // 'harga_jual',
    ];

    public function produk()
    {
        return $this->belongsTo(produk::class, 'produk_id', 'id');
    }
    public function restok()
    {
        return $this->belongsTo(restok::class, 'restok_id', 'id');
    }
}
