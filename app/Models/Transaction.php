<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tarif',
        'user',
        'jam_mulai',
        'jam_selesai',
        'lama_main',
        'total_harga'
    ];
}