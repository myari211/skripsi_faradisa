<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table="siswa";
    protected $fillable = ['id', 'nama_siswa', 'nomor_induk', 'email', 'jenis_kelamin', 'kelas_id'];
    public $incrementing = false;
}
