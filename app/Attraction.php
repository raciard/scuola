<?php

namespace App;

use function App\Helpers\getLangId;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = [
        'latitude', 'longitude', 'cover_image',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question', 'attraction_id', 'id');
    }

    public function infos()
    {
        return $this->hasMany('App\AttractionInfo', 'attraction_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'attraction_category');
    }

    public function getInfoAttribute()
    {
        return $this->infos()->where('language_id', getLangId())->first();
    }

    public function getCategoriesAttribute()
    {
        return $this->categories()->get()->map(function($item) {return $item->info->name;});
    }
}
