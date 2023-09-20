<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sawah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nosawah',
        'namasawah',
        'luas',
        'lokasi',
        'latlang',
        'b_barat',
        'b_utara',
        'b_timur',
        'b_selatan',
        'namapenjual',
        'img',
        'user_id',
        'hargabeli',
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
