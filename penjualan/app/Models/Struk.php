<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Struk extends Model
{
    use HasFactory;
    protected $table = 'struk';
    protected $primaryKey = 'id_struk';
    protected $fillable = [
        'id',
        'id_barang',
        'items',
        'jumlah_barang',
        'diskon',
        'total',
        'tunai',
        'jumlah_total',
        'kembalian',
        

    ];

    protected $casts = [
        'items' => 'json', // or 'text' depending on your database configuration
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function getBarangNamesAttribute()
    {
        $barangIds = explode(',', $this->attributes['id_barang']);
        $barangNames = Barang::whereIn('id_barang', $barangIds)->pluck('nama_barang')->implode(', ');

        return $barangNames;
    }
}