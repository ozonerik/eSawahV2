<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appconfig extends Model
{
    use HasFactory;
    protected $fillable = [
        'mapapikey',
        'hargapadi',
        'nilailanja',
        'hargabata',
    ];
}
