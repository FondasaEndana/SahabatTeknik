<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $table = "service_requests";

        use SoftDeletes;
        use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'service_type', 'description'
    ];
}
