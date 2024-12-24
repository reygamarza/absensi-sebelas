<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $primaryKey = 'id_presensi';
    protected $fillable = ['nis', 'status', 'foto_masuk', 'foto_pulang', 'keterangan', 'tanggal', 'jam_masuk', 'jam_pulang', 'koordinat_masuk', 'koordinat_pulang', 'menit_keterlambatan'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }
}

