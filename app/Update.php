<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    public $timestamps = false;
	
    public function project() {
    	return $this->belongsTo('App\Project');
    }
}
