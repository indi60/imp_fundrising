<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'm_kecamatan';
    protected $fillable = [
        'kabupaten_id', 'nama_kecamatan' 
    ];
}
