<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_checksheet extends Model
{
    use HasFactory;
    protected $table = 'detail_checksheet';
    protected $fillable = [
        'id_checksheet',
        'id_item_checksheet',
        'dilakukan',
        'hasil',
        'keterangan'
    ];
}
