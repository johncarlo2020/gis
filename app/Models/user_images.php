<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_images extends Model
{
    use HasFactory;

     protected $table = 'user_images';

     protected $fillable = [
        'name', 'path'
    ];



}
