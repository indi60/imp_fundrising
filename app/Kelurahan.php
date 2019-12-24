<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'm_kelurahan';
    protected $fillable = [
        'kecamatan_id', 'nama_kelurahan' 
    ];
}
