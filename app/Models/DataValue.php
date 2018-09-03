<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DataValue extends Model
{
    protected $fillable = ['data_id', 'device_id', 'value'];
}
