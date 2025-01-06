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

    public function tenagaKependidikan()
    {
        return $this->belongsTo(TenagaKependidikan::class, 'nip');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }

    public function scopeSearch($query, $value)
    {
        return $query->whereHas('jurusan', function ($q) use ($value) {
            $q->where('nama_jurusan', 'like', "%{$value}%");
        })->orWhereHas('tenagaKependidikan.user', function ($q) use ($value) {
            $q->where('nama', 'like', "%{$value}%");
        })->orWhere('tingkat', 'like', "%{$value}%")
            ->orWhere('nomor_kelas', 'like', "%{$value}%");
    }
}
