<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class portofolio extends Model
{
        public $table = "portofolio";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'title',
            'desc',
            'slug',
            'tahun',
            'github',
            'demo',
        ];

        public function label()
        {
            return $this->hasMany(label::class,'parrent_id','id');
        }

    public static function boot() {
        parent::boot();

        static::deleting(function($portofolio) { // before delete() method call this
             $portofolio->label()->delete();
             // do the rest of the cleanup...
        });
    }

}
