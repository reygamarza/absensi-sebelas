<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaktuPresensi extends Model
{
    protected $fillable = ['jam_masuk', 'batas_presensi_masuk', 'jam_pulang', 'batas_presensi_pulang'];

    public $timestamps = true;
}
