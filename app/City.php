<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function projects() {
    	return $this->hasMany('App\Project');
    }

    public function regions() {
        return $this->hasMany('App\Region');
    }

    public function country() {
    	return $this->belongsTo('App\Country');
    }
}