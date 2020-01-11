<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'id_guru ', 'tgl', 'status', 
    ];
}
