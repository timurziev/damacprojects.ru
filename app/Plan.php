<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public $timestamps = false;
	
    public function projects() {
    	return $this->belongsTo('App\Project');
    }
}
