<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    public $timestamps = false;
    protected $table='Count_herd';
    protected $primaryKey = 'count_id';
}
