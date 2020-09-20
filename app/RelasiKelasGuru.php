<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class RelasiKelasGuru extends Model
{
    protected $table = "relasi_kelas_guru";
    protected $fillable = ['kode_guru', 'kode_kelas'];
    public $incrementing = false;
}
