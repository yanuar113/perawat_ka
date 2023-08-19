<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checksheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_time',
        'no_kereta',
        'tipe',
        'jam_engine'
    ];
}
