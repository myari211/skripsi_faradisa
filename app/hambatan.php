<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hambatan extends Model
{
    protected $table = "hambatan";
    protected $fillable = ['learning_obstacle', 'link'];
    public $incrementing = false;
}
