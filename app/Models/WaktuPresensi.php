<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaktuPresensi extends Model
{
    protected $primaryKey = 'id_waktu_presensi';
    protected $fillable = ['presensi_masuk', 'batas_presensi_masuk', 'presensi_pulang', 'batas_presensi_pulang'];

    public $timestamps = true;
}
