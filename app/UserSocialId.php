<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialId extends Model
{
    protected $fillable = [
        'provider', 'token', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
