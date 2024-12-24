<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['id_jurusan', 'nip', 'nomor_kelas', 'tingkat', 'kapasitas'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class, 'nip');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}

