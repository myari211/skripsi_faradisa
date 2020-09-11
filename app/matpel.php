<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matpel extends Model
{
    protected $table = "mata_pelajaran";
    protected $fillable = ['id_matpel', 'kode_matpel', 'nama_matpel'];
    public $incrementing = false;
}
