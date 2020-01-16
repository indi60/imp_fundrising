<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefBank extends Model
{
    protected $table = 'ref_bank';
    protected $fillable = [
        'nama_bank', 
        'nama_rekening', 
        'no_rekening',
    ];
}
