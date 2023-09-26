<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'tv_id',
        'user',
        'jam_mulai',
        'jam_selesai',
        'lama_main',
        'total_rent',
        'total_tambahan',
        'ket',
        'nama_menu',
        'harga_menu',
        'jumlah',
        'total'
    ];

    public function financeDataTVName()
    {
        return $this->belongsTo(Television::class, 'tv_id');
    }
}