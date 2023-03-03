<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_classification extends Model
{
    use HasFactory;

    protected $table='client_classifications';

    protected $fillable = [
        'name', 'description','status'
    ];
}
