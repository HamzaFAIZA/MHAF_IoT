<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class DeviceData extends Model
{
    protected $fillable = ['name', 'value'];
}
