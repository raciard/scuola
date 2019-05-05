<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionInfo extends Model
{
    //

    protected $fillable = [
        'attraction_id', 'language_id', 'name', 'description'
    ];
}
