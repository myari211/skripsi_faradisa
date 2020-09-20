<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mata_pelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $fillable = ['id', 'nama_matpel', 'kode_matpel'];
    public $incrementing = false;

    public function guru(){
        return $this->hasOne('App\guru');
    }
}
