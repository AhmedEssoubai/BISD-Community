<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    //

    protected $table = 'groupe';
    protected $fillable = ['label', 'icon', 'etat'];

    public function posts() {
        return $this->hasMany(App\Post::class);
    }

    /**
     * Group have many user and can have many admin
     */
    public function users() {
        return $this->belongsToMany('App\User', 'appartenire');
    }
}
