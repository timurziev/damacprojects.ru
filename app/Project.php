<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = ['title', 'description', 'content', 'slug', 'city', 'city_id', 'country_id', 'region_id', 'status', 'category_id', 'media', 'facilities', 'community_info', 'update', 'view_pdf', 'download_pdf', 'is_slide', 'is_popular', 'lat', 'lng'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function city() {
        return $this->belongsTo('App\City');
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function region() {
        return $this->belongsTo('App\Region');
    }

    public function images() {
    	return $this->hasMany('App\Images');
    }

    public function plans() {
        return $this->hasMany('App\Plan');
    }
}
