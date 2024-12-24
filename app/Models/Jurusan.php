<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['id_jurusan', 'nama_jurusan'];

    public $incrementing = false;

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_jurusan');
    }
}
