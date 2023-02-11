<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qualifications extends Model
{
    use HasFactory;

    protected $table='qualifications';

    protected $fillable = [
        'qualification_type_id','name','status',
    ];

}
