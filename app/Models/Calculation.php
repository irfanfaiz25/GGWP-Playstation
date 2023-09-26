<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function MenuPurchase()
    {
        return $this->belongsTo(Transaction::class, 'tv_id');
    }
}