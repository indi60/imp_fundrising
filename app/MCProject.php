<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCProject extends Model
{
    protected $table = 'm_project';
    protected $fillable = [
        'nama_project', 
        'konten', 
        'target', 
        'terkumpul', 
        'tanggal_dibuka', 
        'tanggal_ditutup', 
        'status', 
        'owner_id', 
        'kategori_project',
        'gallery',
    ];
}
