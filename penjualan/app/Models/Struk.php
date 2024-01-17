<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    use HasFactory;
    protected $table = 'struk';
    protected $primaryKey = 'id_struk';
    protected $fillable = [
        'id_user',
        'id_barang',
        'jumlah_barang',
        'total',
        'tunai',
        'kembalian',
        

    ];
}