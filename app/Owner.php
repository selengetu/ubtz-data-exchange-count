<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $timestamps = false;
    protected $table='Const_owner';
    protected $primaryKey = 'owner_id';
}
