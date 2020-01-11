<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'id_guru', 'tgl', 'id_kelas', 'id_pelajaran',
    ];
}
