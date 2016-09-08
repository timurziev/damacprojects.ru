<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	protected $fillable = ['name', 'city_id'];

    public function projects() {
        return $this->hasMany('App\Project');
    }

    public function cities() {
        return $this->belongsTo('App\City');
    }
}
