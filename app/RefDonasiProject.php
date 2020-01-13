<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefDonasiProject extends Model
{
    protected $table = 'ref_donasi_project';
    protected $fillable = ['project_id', 'owner_id', 'donasi', 'status'];
}
