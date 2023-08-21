<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_checksheet extends Model
{
    use HasFactory;
    protected $table = 'item_checksheet';
    protected $fillable = [
        'id_kategori_checksheet',
        'nama_item',
        'id_kereta'
    ];
}
