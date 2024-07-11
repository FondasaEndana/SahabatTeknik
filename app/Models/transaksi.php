<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksi extends Model
{
    public $table = "transaksi";

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'kodetrans',
        'pelanggan_id',
        'pelanggan_tipe',
        'transaksi_tipe',
        'tglbeli',
        'ppn',
        'status', //status pembayaran
        'photo_konfirmasi',
        'totalbayar',
        'penanggungjawab',
        'dibayar',
        'kembalian',
        'provinsi_id',
        'city_id',
        'weight',
        'courir',
        'ongkir',
        'totaltagihan',
        'telp',
    ];
    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'pelanggan_id', 'id');
    }
    public function transaksidetail()
    {
        return $this->hasMany(transaksidetail::class, 'transaksi_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($transaksi) { // before delete() method call this
            $transaksi->transaksidetail()->delete();
            // do the rest of the cleanup...
        });
    }
}
