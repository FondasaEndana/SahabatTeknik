<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class restok extends Model
{
        public $table = "restok";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'kodetrans',
            'namatoko',
            'tglbeli',
            'totalbayar',
            'penanggungjawab',
        ];
        public function produkdetail()
        {
            return $this->hasMany(produkdetail::class,'restok_id','id');
        }

    public static function boot() {
        parent::boot();
        static::deleting(function($restok) { // before delete() method call this
             $restok->produkdetail()->delete();
             // do the rest of the cleanup...
        });
    }

}
