<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kereta extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'master_kereta';
    protected $fillable = [
        'username',
        'password',
        'nama_kereta',
        'nomor_kereta',
        'foto'
    ];
}
