<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['id_kelas', 'nama_kelas', 'jurusan_id'];
    public $incrementing = false;
}
