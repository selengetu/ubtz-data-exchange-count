<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herd extends Model
{
    public $timestamps = false;
    protected $table='Const_herd';
    protected $primaryKey = 'herd_id';
}
