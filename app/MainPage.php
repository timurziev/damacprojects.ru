<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    public function static_page() {
        return $this->hasMany('App\Static_Page');
    }
}
