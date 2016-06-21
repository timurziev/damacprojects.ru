<?php

use Date\DateFormat;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{

    public function getCreatedAtAttribute($attr)
    {
        return DateFormat::post($attr);
    }

}