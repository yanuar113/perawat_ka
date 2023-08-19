<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    use HasFactory;
    protected $table = 'master_kereta';
    protected $fillable = [
        'username',
        'password',
        'nama_kereta',
        'foto'
    ];
}
