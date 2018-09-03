<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

class Trigger extends Model
{
    // Setup the primary key as a unique string key
    public $incrementing = true;

    // Attributes
    protected $fillable = ['name', 'datatype', 'condition', 'value', 'action'];

    protected $table = 'triggers';
}
