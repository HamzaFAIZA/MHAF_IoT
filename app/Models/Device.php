<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Device extends Model
{
    // Setup the primary key as a unique string key
    public $incrementing = false;
    public $keyType = "string";

    // Disable timestamp columns
    public $timestamps = false;

    // Attributes
    protected $fillable = ['name', 'description', 'longitude', 'latitude', 'templates_id'];
}
