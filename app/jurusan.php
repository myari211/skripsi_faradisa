<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = 'jurusan';
    protected $fillable = ['id_jurusan', 'kode_jurusan', 'nama_jurusan'];
    public $incrementing = false;
}
