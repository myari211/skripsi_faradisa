<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'guru';
    protected $fillabel = ['id', 'nip', 'nama_guru', 'kode_guru', 'matpel_id', 'email'];
    public $incrementing = false;
}
