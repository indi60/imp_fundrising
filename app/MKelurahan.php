<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MKelurahan extends Model
{
    protected $table = 'm_kelurahan';
    protected $fillable = [
        'kecamatan_id', 
        'nama_kelurahan' 
    ];
}
