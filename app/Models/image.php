<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class image extends Model
{
        public $table = "image";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'nama',
            'prefix',
            'parrent_id',
            'desc',
            'photo',
        ];

}
