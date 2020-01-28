<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefLaporanProject extends Model
{
    protected $table = 'ref_laporan_project';
    protected $fillable = [
        'project_id',
        'owner_id',
        'judul_laporan',
        'konten_laporan',
        'tanggal_laporan',
        'status',
    ];
}
