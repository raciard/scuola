<?php

namespace App;

use function App\Helpers\getLangId;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function infos()
    {
        return $this->hasMany('App\CategoryInfo', 'category_id', 'id');
    }

    public function getInfoAttribute()
    {
        return $this->infos()->where('language_id', getLangId())->first();
    }
}
