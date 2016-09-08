<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $fillable = ['name'];

    public function projects() {
    	return $this->hasMany('App\Project');
    }

    public function cities() {
        return $this->hasMany('App\City');
    }
}
