<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produk extends Model
{
    public $table = "produk";

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga_jual',
        'slug',
        'desc',
        'satuan',
        'produk',
    ];

    public function produkdetail()
    {
        return $this->hasMany(produkdetail::class, 'produk_id', 'id');
    }


    // public static function boot() {
    // parent::boot();
    // static::deleting(function($produk) { // before delete() method call this
    //      $produk->produkdetail()->delete();
    //      // do the rest of the cleanup...
    // });
    // }

}
