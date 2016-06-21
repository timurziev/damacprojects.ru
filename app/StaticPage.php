<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    public function main_page() {
        return $this->belongsTo('App\Main_Page');
    }
}
