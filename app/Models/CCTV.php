<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    protected $table = 'cctvs';

    protected $fillable = [
        'name', 'lat', 'lng', 'stream_url',
    ];
}
