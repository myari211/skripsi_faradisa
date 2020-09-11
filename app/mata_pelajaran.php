<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mata_pelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $fillable = ['id_matpel', 'nama_matpel', 'kode_matpel'];
}
