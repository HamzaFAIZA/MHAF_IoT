<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = ['data_id', 'value'];
}
