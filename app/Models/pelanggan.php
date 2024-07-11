<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pelanggan extends Model
{
        public $table = "pelanggan";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'nama',
            'jk',
            'alamat',
            'telp', //status pembayaran
            'users_id',
        ];

        public function Users()
        {
            return $this->belongsTo(User::class,'users_id','id');
        }

    public static function boot() {
        parent::boot();
        static::deleting(function($pelanggan) { // before delete() method call this
             $pelanggan->Users()->delete();
             // do the rest of the cleanup...
        });
    }

}
