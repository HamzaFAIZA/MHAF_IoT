<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DataGroup extends Eloquent
{


    public function datatypes()
    {
        return $this->belongsToMany('App\Models\DataType');
    }

    //protected $appends = array('availability');
}
