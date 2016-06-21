<?php

use Date\DateFormat;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{

    public function getCreatedAtAttribute($attr)
    {
        return DateFormat::releases_and_news($attr);
    }

}