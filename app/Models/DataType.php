<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model;


class DataType extends Model
{
    protected $fillable = ['_id','data_type_name', 'data_type_unit', 'data_type_type'];

    protected $table = 'datatypes';

}
