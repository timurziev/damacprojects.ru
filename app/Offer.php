<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['title', 'description', 'text', 'price', 'slug', 'location', 'image', 'media', 'view_pdf', 'download_pdf', 'lat', 'lng'];

    public function offer_images()
    {
    	return $this->hasMany('App\Offer_image');
    }
}
