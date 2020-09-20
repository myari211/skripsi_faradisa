<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class relasi_kelas_guru extends Model
{
    protected $table = "relasi_kelas_guru";
    protected $fillable = ['$kode_guru', 'kelas_guru'];
    public $incrementing = false;
}
