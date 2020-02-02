<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'email', 'prenom', 'password',
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

    /**
     * The user add a list of post to his favoit
     * 
     */
    public function post()
    {
        return $this->hasMany(App\Post::class);
    }

    /**
     * The user can post manu post
     * 
     */
    public function publish()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * User can belong to a group and can be an admin of a group
     */
    public function groupe()
    {
        return $this->belongsToMany('App\Groupe', 'appartenire')->withPivot(['type']);
    }


    public function favorises_post()
    {
        return $this->belongsToMany(User::class, 'favorise', 'compte_id', 'post_id');
    }
}
