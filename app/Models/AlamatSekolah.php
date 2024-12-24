<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlamatSekolah extends Model
{
    protected $fillable = ['latitude', 'longitude', 'radius_maksimum'];

    public $timestamps = true;
}
