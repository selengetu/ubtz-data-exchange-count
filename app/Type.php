<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    protected $table='Const_type';
    protected $primaryKey = 'type_id';
}
