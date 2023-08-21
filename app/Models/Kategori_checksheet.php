<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_checksheet extends Model
{
    use HasFactory;
    protected $table = 'kategori_checksheet';
    protected $fillable = [
        'nama',
        'id_kereta'
    ];
}
