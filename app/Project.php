<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = ['title', 'description', 'content', 'slug', 'city', 'location_id', 'status', 'category_id', 'media', 'facilities', 'community_info', 'update', 'view_pdf', 'download_pdf'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function location() {
        return $this->belongsTo('App\Location');
    }


    public function images() {
    	return $this->hasMany('App\Images');
    }
}
