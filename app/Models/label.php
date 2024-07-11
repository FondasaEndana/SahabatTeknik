<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class label extends Model
{
        public $table = "label";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'nama',
            'prefix',
            'parrent_id',
        ];

}
