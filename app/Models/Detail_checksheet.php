<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_checksheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kategori_checksheet',
        'id_sub_kategori_checksheet',
        'uraian_pekerjaan',
        'dilakukan',
        'hasil',
        'keterangan'
    ];
}
