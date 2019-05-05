<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute()
    {
        $mail_hash = md5($this->attributes['email']);
        return "https://api.adorable.io/avatars/256/$mail_hash.png";
    }

    public function getPositionAttribute()
    {
        return (User::count() - User::where('score', '<', $this->attributes['score'])->count());
    }

    public function socials()
    {
        return $this->hasMany('App\UserSocialId', 'user_id', 'id');
    }

    public function attractions()
    {
        return $this->belongsToMany('App\Attraction', 'attraction_user');
    }

    public function trips()
    {
        return $this->belongsToMany('App\Trip', 'trip_user');
    }

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    public function isAdmin()    {        
        return $this->type === self::ADMIN_TYPE;    
    }
}
